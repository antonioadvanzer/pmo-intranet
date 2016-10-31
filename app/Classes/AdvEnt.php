<?php
/**
 * Created by PhpStorm.
 * User: antoniobaez
 * Date: 27/10/16
 * Time: 3:44 PM
 */

namespace App\Classes;

use Session;
use Hash;
use Exception;
use App\Models\BusinessUnit;
use App\Models\CategoryElement;
use App\Models\Company;
use App\Models\Permission;
use App\Models\PMO;
use App\Models\Project;
use App\Models\Rol;
use App\Models\TypeUser;
use App\Models\Users;

class AdvEnt
{

    /**
     * Start new session
     *
     * @return Boolean
     */
    public static function startSession(Array $user)
    {
        $u = Users::where('nickname', $user['nickname'])->get()->first();

        try{

            if(isset($u) & (Hash::check($user['password'], $u->password))){

                $member = [
                    'id' => $u->id,
                    'username' => $u->nickname,
                    'password' => $u->password,
                    'type' => $u->type,
                    'rol' => $u->rol,
                    'pmo' => $u->pmo,
                    // Load permissions and routes allowed
                    'routesAllowed' => AdvEnt::permissionZone($u->rol)
                ];

                Session::push("user", $member);

                return true;
            }else{
                return false;
            }

        }catch(Exception $ex){
            return false;
        }
    }

    /**
     * Close current session
     *
     * @return Boolean
     */
    public static function closeSession()
    {
        Session::forget("user");
    }

    /**
     * If current user is customer, this function gets pmo object
     *
     * @return PMO
     */
    public static function getPMO()
    {
        return PMO::where('id',(session("user")[0]['pmo']))->get()->first();
    }

    /**
     * If current user is customer, this function gets pmo object
     *
     * @return PMO
     */
    public static function getPMORoute()
    {
        $pmo = PMO::where('id',(session("user")[0]['pmo']))->get()->first();

        $route = str_replace(" ", "-", $pmo->getProject()->get()->first()->name);

        return $route;
    }

    /**
     * Determinate that user is logged
     *
     * @return Boolean
     */
    public static function checkUser()
    {
        return Session::has("user");
    }

    /**
     * Determinate that user is administrator
     *
     * @return Boolean
     */
    public static function isAdmin()
    {
        $admin = session("user")[0];

        return ($admin['type'] == 1) ? true : false;
    }

    /**
     * Determinate that user is employed
     *
     * @return Boolean
     */
    public static function isEmployed()
    {
        $employed = session("user")[0];

        return ($employed['type'] == 2) ? true : false;
    }

    /**
     * Determinate that user is customer
     *
     * @return Boolean
     */
    public static function isCustomer()
    {
        $client = session("user")[0];

        return ($client['type'] == 3) ? true : false;
    }

    /**
     * Get rol with permissions
     *
     * @return Object
     */
    private static function permissionZone($id_rol)
    {
        //$user = session("user")[0];

        $rol = Rol::where('id', $id_rol)->get()->first();

        //$permissions = $rol->getAllPermissions()->get();

        $permissions = $rol->getAllPermissions()->where('E',null)->get();

        //dd(count($permissions));
        //dd($permissions);
        //exit;

        if(count($permissions) >= 1){

            $permissions = $permissions->first();

            //dd($permissions);exit;

            $routesAllowed = array();

            array_push($routesAllowed,
                [ 'companies', [ $permissions->create, $permissions->read, $permissions->update, $permissions->delete ] ],
                [ 'advanzer', [ $permissions->create, $permissions->read, $permissions->update, $permissions->delete ] ],
                [ 'entuizer', [ $permissions->create, $permissions->read, $permissions->update, $permissions->delete ] ]
            );

            $bussines = BusinessUnit::all();

            foreach($bussines as $b){

                array_push($routesAllowed,
                    [ AdvEnt::createRouteFormat($b->name), [ $permissions->create, $permissions->read, $permissions->update, $permissions->delete ] ]
                );
            }

        }



        dd($routesAllowed);

        return $routesAllowed;

    }

    /**
     * Determinate that user customer has permission to access company
     *
     * @return Boolean
     */
    public static function hasPermissionTo($path)
    {
        $user = session("user")[0];

        $routesAllowed = $user['routesAllowed'];
        //dd($routesAllowed);
        $next = false;

        foreach($routesAllowed as $r){
            if(in_array($path, $r)){
                $next = true;
                break;
            }
        }

        return $next;
    }

    /**
     * create a path format
     *
     * @return String
     */
    private static function createRouteFormat($string)
    {
        return str_replace(" ", "-", strtolower($string));
    }
}