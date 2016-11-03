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
use URL;
use Html;
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
                    'company' => $u->company,
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

        }catch(Exception $ex){//dd($ex);
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

        $user = session("user")[0];

        $route = "";

        if($user['company'] == 1){
            $route = "advanzer/";
        }elseif($user['company'] == 2){
            $route = "entuizer/";
        }

        $route .= AdvEnt::createRouteFormat($pmo->getProject()->get()->first()->name);

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
     * Determinate company
     *
     * @return Boolean
     */
    public static function css()
    {
        $path = url()->current();

        if(strpos($path, 'entuizer') !== false){
            return Html::style('css/entuizer/styles.css');
        }elseif(strpos($path, 'advanzer') !== false){
            return Html::style('css/advanzer/styles.css');
        }
    }

    /**
     * Determinate company
     *
     * @return Boolean
     */
    public static function logo()
    {
        $path = url()->current();

        if(strpos($path, 'entuizer') !== false){
            return Html::image('img/EN_logo.png',"Logo",array('width'=>'20%'));
        }elseif(strpos($path, 'advanzer') !== false){
            return Html::image('img/AD_logo.png',"Logo",array('width'=>'20%'));
        }
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
    private static function permissionZone($id_rol=null)
    {
        if($id_rol != null){

            //$user = session("user")[0];

            $rol = Rol::where('id', $id_rol)->get()->first();

            //$permissions = $rol->getAllPermissions()->get();

            //dd(count($permissions));
            //dd($permissions);
            //exit;

            $routesAllowed = array();

            // Level 1:  -------------------------------------------------------------------------------------------------
            array_push($routesAllowed,["route" => 'companies']);
            //---------------------------------------------------------------------------------------------------------------------

            // Level 2: companies -------------------------------------------------------------------------------------------------

            $permissions = $rol->getAllPermissions()->where('E', null)->get();

            $permissions = $permissions->first();

            //dd($permissions);exit;

            if($permissions != null){

                array_push($routesAllowed,
                    ["route" => 'advanzer/businessUnit'],
                    ["route" => 'entuizer/businessUnit']
                );
                //exit;
            }else{

                $permissions = $rol->getAllPermissions()->where('E', AdvEnt::createRouteFormat("Advanzer"))->get();
                if($permissions != null){
                    array_push($routesAllowed,
                        ["route" => 'advanzer/businessUnit']
                    );
                }

                $permissions = $rol->getAllPermissions()->where('E', AdvEnt::createRouteFormat("Entuizer"))->get();
                if($permissions != null){
                    array_push($routesAllowed,
                        ["route" => 'entuizer/businessUnit']
                    );
                }

            }

            //---------------------------------------------------------------------------------------------------------------------

            // Level 3: business units and categories -------------------------------------------------------------------------------------------------

            //$permissions = $rol->getAllPermissions()->where('E', null)->get();

            $permissions = $rol->getAllPermissions()->get();

            //dd($permissions);


            foreach($permissions as $p){

                $business = null;

                if($p->E == null){
                    $business = BusinessUnit::all();
                }else{
                    $business = BusinessUnit::where('company', $p->E)->get();
                }

                foreach($business as $b){

                    $projects = null;

                    if($p->UN == null){
                        $projects = Project::all();
                    }else{
                        $projects = Project::where('business_unit', $p->UN)->get();
                    }

                    $category = null;

                    if($p->C == null){
                        $category = CategoryElement::all();
                    }else{
                        $category = CategoryElement::where('id',$p->C)->get();
                    }

                    foreach($category as $ce){
                        array_push($routesAllowed,
                           ["route" => AdvEnt::createRouteFormat($b->getCompanyAssociated()->first()->name)."/".AdvEnt::createRouteFormat($b->name)."/".AdvEnt::createRouteFormat($ce->name)."/projects", "businessunit" => $b->id, "category" => $ce->id]
                        );
                    }

                    foreach($projects as $pr){
                        $route = AdvEnt::createRouteFormat($pr->getBusinessUnitAssociated()->first()->getCompanyAssociated()->first()->name)."/".AdvEnt::createRouteFormat($pr->getBusinessUnitAssociated()->first()->name)."/".AdvEnt::createRouteFormat($pr->getCategoryAssociated()->first()->name)."/".AdvEnt::createRouteFormat($pr->name);

                        array_push($routesAllowed,
                            ["route" => $route, "permissions" => [$p->create, $p->read, $p->update, $p->delete], "project" => $pr->id ]
                            //[$route, [$p->create, $p->read, $p->update, $p->delete], $pr->id ]
                        );
                    }

                }

            }

//dd($routesAllowed);
//exit;

            return $routesAllowed;

        }else{
            return null;
        }

    }

    /**
     * Get business units by company
     *
     * @return Array
     */
    public static function getBusinessUnits($company)
    {
        $businessUnits = array();

        $resources = BusinessUnit::where('company',$company)->get();

        $category = CategoryElement::all();

        foreach($resources as $r){

            $catel = array("id" => $r->id, "name" => $r->name, "icon" => $r->icon);

            $cont=1;

            foreach($category as $ca){
                $urlRoute = AdvEnt::createRouteFormat($r->getCompanyAssociated()->first()->name)."/".AdvEnt::createRouteFormat($r->name)."/".AdvEnt::createRouteFormat($ca->name)."/projects";

                $catel["rute".$cont] = URL::to($urlRoute);

                //$catel["rute".$cont] = AdvEnt::createRouteFormat($r->name)."/".AdvEnt::createRouteFormat($ca->name)."/projects";
                $cont++;
            }

            array_push($businessUnits, $catel);
        }
        //dd($businessUnits);
        return $businessUnits;
    }

    /**
     * Get business units by company
     *
     * @return Elements
     */
    public static function getMenuProjects($path)
    {
        $user = session("user")[0];
        $resources = $user['routesAllowed'];
        $elements = array();
        //dd($resources);
        //dd(utf8_encode($path));
        foreach($resources as $re){
            if($path == $re['route']){
                //dd($path." ".$re['route']);
                $projects = Project::where('business_unit', $re['businessunit'])->where('category_project', $re['category'])->get();
                //dd($elements);

                foreach($projects as $p){

                    $urlRoute = AdvEnt::createRouteFormat($p->getBusinessUnitAssociated()->first()->getCompanyAssociated()->first()->name)."/".AdvEnt::createRouteFormat($p->getBusinessUnitAssociated()->first()->name)."/".AdvEnt::createRouteFormat($p->getCategoryAssociated()->first()->name)."/".AdvEnt::createRouteFormat($p->name);
                    //dd($urlRoute);
                    array_push($elements, array(
                        "id" => $p->id,
                        "name" => $p->name,
                        "client" => $p->client,
                        "progress" => $p->progress,
                        "route" => URL::to($urlRoute)
                    ));
                }

                break;
            }
        }

        return $elements;
    }

    /**
     * Get project
     *
     * @return Elements
     */
    public static function getProject($path)
    {
        $user = session("user")[0];
        $resources = $user['routesAllowed'];
        $elements = null;

        foreach($resources as $re){
            if($path == $re['route']){
                //dd($path." ".$re['route']);
                $elements = Project::where('id', $re['project'])->get();
                //dd($elements);
                break;
            }
        }

        return $elements;
    }

    /**
     * Determinate that user customer has permission to access company
     *
     * @return Boolean
     */
    public static function hasPermissionTo($path)
    {
        $user = session("user")[0];
        //dd($path);
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
        //return str_replace(" ", "-", AdvEnt::deleteSimbols(strtolower($string)));
        //return str_replace("","-",strtr(strtolower($string),'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ','aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY'));
        //return str_replace(" ", "-", AdvEnt::sanear_string(strtolower(utf8_decode($string))));
        //return str_replace("","-",strtr(strtolower(utf8_encode($string)),'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ','aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY'));

        //dd(AdvEnt::deleteSimbols($string));
        //dd(strtr(utf8_encode("àá"),'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ','aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY'));
        return str_replace(" ","-",AdvEnt::deleteSimbols($string));
    }

    private static function deleteSimbols($text)
    {
        $text = htmlentities($text, ENT_QUOTES, 'UTF-8');
        $text = strtolower($text);
        $patron = array (
            // Espacios, puntos y comas por guion
            //'/[\., ]+/' => ' ',

            // Vocales
            '/\+/' => '',
            '/&agrave;/' => 'a',
            '/&egrave;/' => 'e',
            '/&igrave;/' => 'i',
            '/&ograve;/' => 'o',
            '/&ugrave;/' => 'u',

            '/&aacute;/' => 'a',
            '/&eacute;/' => 'e',
            '/&iacute;/' => 'i',
            '/&oacute;/' => 'o',
            '/&uacute;/' => 'u',

            '/&acirc;/' => 'a',
            '/&ecirc;/' => 'e',
            '/&icirc;/' => 'i',
            '/&ocirc;/' => 'o',
            '/&ucirc;/' => 'u',

            '/&atilde;/' => 'a',
            '/&etilde;/' => 'e',
            '/&itilde;/' => 'i',
            '/&otilde;/' => 'o',
            '/&utilde;/' => 'u',

            '/&auml;/' => 'a',
            '/&euml;/' => 'e',
            '/&iuml;/' => 'i',
            '/&ouml;/' => 'o',
            '/&uuml;/' => 'u',

            '/&auml;/' => 'a',
            '/&euml;/' => 'e',
            '/&iuml;/' => 'i',
            '/&ouml;/' => 'o',
            '/&uuml;/' => 'u',

            // Otras letras y caracteres especiales
            '/&aring;/' => 'a',
            '/&ntilde;/' => 'n',

            // Agregar aqui mas caracteres si es necesario

        );

        $text = preg_replace(array_keys($patron),array_values($patron),$text);
        return $text;
    }

    private static function sanear_string($string)
    {

        $string = trim($string);

        $string = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $string
        );

        $string = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $string
        );

        $string = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $string
        );

        $string = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $string
        );

        $string = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $string
        );

        $string = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C',),
            $string
        );

        //Esta parte se encarga de eliminar cualquier caracter extraño
        /*$string = str_replace(
            array("\", "¨", "º", "-", "~",
             "#", "@", "|", "!", """,
             "·", "$", "%", "&", "/",
             "(", ")", "?", "'", "¡",
             "¿", "[", "^", "<code>", "]",
             "+", "}", "{", "¨", "´",
             ">", "< ", ";", ",", ":",
             ".", " "),
        '',
        $string
    );*/


    return $string;
    }

}