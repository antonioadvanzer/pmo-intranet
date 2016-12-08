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
use File;
use Exception;
use App\Models\Users;
use App\Models\TypeUser;
use App\Models\Rol;
use App\Models\Project;
use App\Models\ProjectAttribute;
use App\Models\ProjectAttributeValue;
use App\Models\Permission;
use App\Models\Company;
use App\Models\BusinessUnit;
use App\Models\BusinessUnitAttribute;
use App\Models\BusinessUnitAttributeValue;
use App\Models\PMOAttribute;
use App\Models\PMOCategory;
use App\Models\PMOProject;
use App\Models\PMOProjectAttribute;
use App\Models\GDLink;

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
                    'name' => $u->name,
                    'lastname' => $u->last_name,
                    'username' => $u->nickname,
                    'password' => $u->password,
                    'type' => $u->type,
                    'company' => $u->company,
                    'rol' => $u->rol,
                    'pmo' => $u->pmo,
                    // Load permissions and routes allowed
                    'routesAllowed' => AdvEnt::permissionZone($u->rol)
                ];
//dd($member);
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
     * Get user's information
     *
     * @return Boolean
     */
    public static function getCurrentUser()
    {
        return session("user")[0];
    }


    /**
     * If current user is customer, this function gets pmo object
     *
     * @return PMO
     */
    public static function getPMO()
    {
        $pmo = PMOProject::where('id',(session("user")[0]['pmo']))->get()->first()->getPmoProjectAttributes()->get();

        //dd($pmo->getPmoProjectAttributes()->get());
        //$pmo = $pmo->getPmoProjectAttributes();

        $elementsPMO = array();

        foreach($pmo as $p){
            //dd($p->getPmoProjectAttributes());

            $attributeElement = $p->getPmoAttributeAssociated()->get()->first();

            //dd($attributeElement);

            // Pendiente de agregar mas campos.....
            array_push($elementsPMO,[
                'elementName'=> $attributeElement->name,
                'icon' => $attributeElement->icon,
                'link' => $p->getLinkAssociated()->get()->first()->link_format
            ]);
        }

        return $elementsPMO;
    }

    /**
     * If current user is customer, this function gets pmo object
     *
     * @return PMO
     */
    public static function getPMORoute()
    {
        $pmo = PMOProject::where('id',(session("user")[0]['pmo']))->get()->first();

        $user = session("user")[0];

        $route = "";

        if($user['company'] == 1){
            $route = "advanzer/";
        }elseif($user['company'] == 2){
            $route = "entuizer/";
        }

        $route .= AdvEnt::createRouteFormat($pmo->getProjectAssociated()->get()->first()->name);

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
        //dd($path);
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

            $permissions = $rol->getAllPermissions()->where('C', null)->get();

            $permissions = $permissions->first();

            //dd($permissions);exit;

            if($permissions != null){

                array_push($routesAllowed,
                    ["route" => 'advanzer/businessUnit'],
                    ["route" => 'entuizer/businessUnit']
                );
                //exit;
            }else{

                $permissions = $rol->getAllPermissions()->where('C', AdvEnt::createRouteFormat("Advanzer"))->get();
                if($permissions != null){
                    array_push($routesAllowed,
                        ["route" => 'advanzer/businessUnit']
                    );
                }

                $permissions = $rol->getAllPermissions()->where('C', AdvEnt::createRouteFormat("Entuizer"))->get();
                if($permissions != null){
                    array_push($routesAllowed,
                        ["route" => 'entuizer/businessUnit']
                    );
                }

            }

            // Destroy variable
            unset($permissions);

//dd($routesAllowed);
            //---------------------------------------------------------------------------------------------------------------------

            // Level 3: business units and categories -------------------------------------------------------------------------------------------------

            //$permissions = $rol->getAllPermissions()->where('E', null)->get();

            $permissions = $rol->getAllPermissions()->get();

            //dd($permissions);


            foreach($permissions as $p){

                //Secret Link
                array_push($routesAllowed,["route" => "foldersAndFiles"]);

                $business = null;

                if($p->C == null){
                    $business = BusinessUnit::all();
                }else{
                    $business = BusinessUnit::where('company', $p->C)->get();
                }

                foreach($business as $b){

                    // Creating route format for BU and his attributes ----------------------------------------------------------------------------------------------
                    array_push($routesAllowed,
                        [
                            "route" => AdvEnt::createRouteFormat($b->getCompanyAssociated()->first()->name)."/".AdvEnt::createRouteFormat($b->name)."/projects",
                            "businessunit" => $b->id
                        ]
                    );

                    $attributes  = $b->getAttributesValues()->get();

                    foreach($attributes as $attr){
                        array_push($routesAllowed,
                            [
                                "route" => AdvEnt::createRouteFormat($b->getCompanyAssociated()->first()->name)."/".AdvEnt::createRouteFormat($b->name)."/attribute/".AdvEnt::createRouteFormat($attr->getBusinessUnitAttributeAssociated()->get()->first()->name),
                                "permissions" => [$p->create, $p->read, $p->update, $p->delete],
                                "attributevalue" => $attr->id,
                                "attribute" => $attr->getBusinessUnitAttributeAssociated()->get()->first()->id,
                                "link" => $attr->getGDLink()->get()->first()->id
                            ]
                        );
                    }

                    // ----------------------------------------------------------------------------------------------------------------------------------------------

                    $projects = null;

                    if($p->BU == null){
                        $projects = Project::all();
                    }else{
                        $projects = Project::where('business_unit', $p->BU)->get();
                    }

                    foreach($projects as $pr){

                        // Creating route format for BU and his attributes ----------------------------------------------------------------------------------------------
                        $route = AdvEnt::createRouteFormat($pr->getBusinessUnitAssociated()->first()->getCompanyAssociated()->first()->name)."/".AdvEnt::createRouteFormat($pr->getBusinessUnitAssociated()->first()->name)."/".AdvEnt::createRouteFormat($pr->name);

                        array_push($routesAllowed,
                            [
                                "route" => $route,
                                "permissions" => [$p->create, $p->read, $p->update, $p->delete],
                                "project" => $pr->id
                            ]
                        );

                        $attributes  = $pr->getAttributesValues()->get();

                        foreach($attributes as $attr){
                            array_push($routesAllowed,
                                [
                                    "route" => AdvEnt::createRouteFormat($b->getCompanyAssociated()->first()->name)."/".AdvEnt::createRouteFormat($b->name)."/".AdvEnt::createRouteFormat($pr->name)."/attribute/".AdvEnt::createRouteFormat($attr->getProjectAttributeAssociated()->get()->first()->name),
                                    "permissions" => [$p->create, $p->read, $p->update, $p->delete],
                                    "attributevalue" => $attr->id,
                                    "attribute" => $attr->getProjectAttributeAssociated()->get()->first()->id,
                                    "link" => $attr->getGDLink()->get()->first()->id
                                ]
                            );
                        }
                        // ----------------------------------------------------------------------------------------------------------------------------------------------
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
     * Get GDLink
     *
     * @return GDLink
     */
    public static function getLink($link)
    {
        return GDLink::where('id', $link)->get()->first();

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

        foreach($resources as $r){

            $catel = array("id" => $r->id, "name" => $r->name, "icon" => $r->icon);

            $urlRoute = AdvEnt::createRouteFormat($r->getCompanyAssociated()->first()->name)."/".AdvEnt::createRouteFormat($r->name)."/projects";

            $catel["rute"] = URL::to($urlRoute);

            $attributes = array();

            $buat = $r->getAttributesValues()->get();

            //dd($buat);

            //$c = 1;

            foreach($buat as $bt){
                //dd($bt->getBusinessUnitAttributeAssociated()->get()->first()->name);

                /*array_push($atributes, [
                    'name' => $bt->getBusinessUnitAttributeAssociated()->get()->first()->name,
                    'link' => $bt->getGDLink()->get()->first()->link_format,
                    'route' => AdvEnt::createRouteFormat($r->getCompanyAssociated()->first()->name)."/".AdvEnt::createRouteFormat($r->name)."/".AdvEnt::createRouteFormat($bt->getBusinessUnitAttributeAssociated()->get()->first()->name)
                ]);*/

                $url = AdvEnt::createRouteFormat($r->getCompanyAssociated()->first()->name)."/".AdvEnt::createRouteFormat($r->name)."/attribute/".AdvEnt::createRouteFormat($bt->getBusinessUnitAttributeAssociated()->get()->first()->name);

                $attributes[$bt->getBusinessUnitAttributeAssociated()->first()->name] = URL::to($url);
            }

            $catel['attributes'] = $attributes;

            array_push($businessUnits, $catel);
        }
        //dd($businessUnits);
        return $businessUnits;
    }

    /**
     * Get BusinessUnitAttribute
     *
     * @return BusinessUnitAttribute
     */
    public static function getBusinessUnitAttribute($id)
    {
        return BusinessUnitAttribute::where('id', $id)->get()->first();

    }

    /**
     * Get business units attributes
     *
     * @return Files
     */
    public static function getBusinessUnitsAttributeValue($path){

        $user = session("user")[0];
        $resources = $user['routesAllowed'];
        //$elements = array();
        //$link = "";
        $attribute = null;

        foreach($resources as $re){
            if($path == $re['route']){
//dd($re['link']);

                //$link = GDLink::where('id', $re['link'])->get()->first();
                $attribute = $re;
                break;
            }
        }

        return $attribute;
    }

    /**
     * Get business units by company
     *
     * @return Elements
     */
    public static function getProjects($path)
    {
        $user = session("user")[0];
        $resources = $user['routesAllowed'];
        $elements = array();
        //dd($resources);
        //dd(utf8_encode($path));
        foreach($resources as $re){
            if($path == $re['route']){
                //dd($path." ".$re['route']);
                $projects = Project::where('business_unit', $re['businessunit'])->get();
                //dd($elements);

                foreach($projects as $p){

                    $urlRoute = AdvEnt::createRouteFormat($p->getBusinessUnitAssociated()->first()->getCompanyAssociated()->first()->name)."/".AdvEnt::createRouteFormat($p->getBusinessUnitAssociated()->first()->name)."/".AdvEnt::createRouteFormat($p->name);
                    //dd($urlRoute);

                    $attributes = array();

                    $poat = $p->getAttributesValues()->get();

                    $bu = $p->getBusinessUnitAssociated()->first();

                    foreach($poat as $pa){

                        $url = AdvEnt::createRouteFormat($bu->getCompanyAssociated()->first()->name)."/".AdvEnt::createRouteFormat($bu->name)."/".AdvEnt::createRouteFormat($p->name)."/attribute/".AdvEnt::createRouteFormat($pa->getProjectAttributeAssociated()->get()->first()->name);

                        $attributes[$pa->getProjectAttributeAssociated()->first()->name] = URL::to($url);
                    }

                    array_push($elements, array(
                        "id" => $p->id,
                        "name" => $p->name,
                        "client" => $p->client,
                        "progress" => $p->progress,
                        "route" => URL::to($urlRoute),
                        "attributes" => $attributes
                    ));
                }

                break;
            }
        }

        return $elements;
    }

    /**
     * Get BusinessUnitAttribute
     *
     * @return BusinessUnitAttribute
     */
    public static function getProjectAttribute($id)
    {
        return ProjectAttribute::where('id', $id)->get()->first();

    }

    /**
     * Get business units attributes
     *
     * @return Files
     */
    public static function getProjectAttributeValue($path){

        $user = session("user")[0];
        $resources = $user['routesAllowed'];
        //$elements = array();
        //$link = "";
        $attribute = null;

        foreach($resources as $re){
            if($path == $re['route']){
//dd($re['link']);

                //$link = GDLink::where('id', $re['link'])->get()->first();
                $attribute = $re;
                break;
            }
        }

        return $attribute;
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
     * Get pmo project
     *
     * @return Elements
     */
    public static function getPMOProject($path)
    {
        $user = session("user")[0];
        $resources = $user['routesAllowed'];
        $elements = null;

        foreach($resources as $re){
            if($path == $re['route']){
                //dd($path." ".$re['route']);
                $elements = Project::where('id', $re['project'])->first()->getPMO()->first();
                //dd($re['project']);
                //dd($elements);
                break;
            }
        }

        return $elements;
    }

    /**
     * Get pmo project
     *
     * @return Elements
     */
    public static function getPMOAttributesProject($pmoid)
    {
        $pmo = PMOProject::where('id', $pmoid)->first()->getPmoProjectAttributes()->get();

        $pmoA = array();

        foreach($pmo as $p){

            $attributeElement = $p->getPmoAttributeAssociated()->get()->first();

            array_push($pmoA,[
                'elementName'=> $attributeElement->name,
                'icon' => $attributeElement->icon,
                'link' => $p->getLinkAssociated()->get()->first()->link_format
            ]);
        }

        return $pmoA;
    }

    /**
     * Get business units attributes files
     *
     * @return Files
     */
    public static function getFoldersAndFiles($dir){

        $elements = array();

        $data1 = File::directories($dir);
        $data2 = File::files($dir);

        foreach($data1 as $d){
            array_push($elements, array(
                "name" => File::name($d),
                "type" => File::type($d),
                "extension" => File::extension($d),
                "route" => $d
            ));
        }

        foreach($data2 as $d){
            array_push($elements, array(
                "name" => File::name($d),
                "type" => File::type($d),
                "extension" => File::extension($d),
                "route" => $d,
                "asset" => asset($d)
            ));
        }

        unset($data1);
        unset($data2);

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