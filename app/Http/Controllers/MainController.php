<?php
/*
    Company: Advanzer S.A de C.V.
    Author: Antonio Báez
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use View;
use Route;
use Google_Client;
use Google_Service_Drive;
use Google_Service_Plus;
use AdvEnt;
use Cache;
use Session;
use File;
//use GuzzleHttp\Client;
//use Aspose;
//use Zend\Zend_Gdata_Spreadsheets;
//use Zend\Http\Client;
//use Zend\Gdata\Zend_Gdata_ClientLogin;
//use ZendGData\Spreadsheets;
//use ZendGData\ClientLogin;
//use ZendGData\Exception;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$cl = new Client();
// Continue....
        $res = $cl->request('POST', 'https://accounts.google.com/signin/challenge/sl/password', [
            'auth' => ['pmo.intranet@advanzer.com', 'advanzer']
        ]);*/

        //dd(Client::setAuth());
            //ZendLoader::loadClass('Zend_Gdata_ClientLogin');
            /*$user = "pmo.intranet@advanzer.com";
            $password = "advanzer";
            //$service = Zend_Gdata_Docs::AUTH_SERVICE_NAME;
            //$service = Spreadsheets::AUTH_SERVICE_NAME;
            $service = 'cl';
            $client = ClientLogin::getHttpClient($user, $password, $service);*/

            /*$client = ClientLogin::getHttpClient($user, $password, $service, null,
                ClientLogin::DEFAULT_SOURCE, null, null,
                ClientLogin::CLIENTLOGIN_URI, 'GOOGLE');*/

           /* try {
                $client = ClientLogin::getHttpClient($user, $password, 'cl');
            } catch (Exception $cre) {
                echo 'URL of CAPTCHA image: ' . $cre->getCaptchaUrl() . "\n";
                echo 'Token ID: ' . $cre->getCaptchaToken() . "\n";
            } catch (Exception $ae) {
                echo 'Problem authenticating: ' . $ae->exception() . "\n";
            }*/

//dd($client->getClientLoginToken());

//----------------------------------------------------------------------------------------------
// create the Google client

       /* $client = new Client();
        $res = $client->request('GET', 'https://www.googleapis.com/auth/drive');
        //dd($res->getBody());
        $client = new Google_Client();

        $client->setAuthConfig(public_path().'/pmo-intranet.json');
        //$client->useApplicationDefaultCredentials();
        //$client->addScope(Google_Service_Drive::DRIVE);
        $client->addScope(Google_Service_Plus::PLUS_ME);

// returns a Guzzle HTTP Client
        $httpClient = $client->authorize();

        dd($httpClient->get('https://www.googleapis.com/plus/v1/people/me'));*/

//----------------------------------------------------------------------------------------------

        /*$client = new Google_Client();

        $access_token = session('token');
dd($access_token);
        $client->setAccessToken($access_token);

        $service = $this->service = new Google_Service_Drive($client);
dd($service->files->listFiles(array())->getItems());
        $files_list = $service->files->listFiles(array());

        if (count($files_list->getFiles()) == 0) {
            print "No files found.\n";
        } else {
            foreach ($files_list->getFiles() as $file) {
                $res['name'] = $file->getName();
                $res['id'] = $file->getId();
                $files[] = $res;
            }
            //print_r($files);
        }

        dd($files);*/

//----------------------------------------------------------------------------------------------

        /*$client = new Google_Client();
        //$client->setHttpClient($cl);
//dd($client->createAuthUrl());

        //$client->setAuthConfig(public_path().'/PMO-Intranet-942863ddf80d.json');
        /*$client->setAuthConfig(public_path().'/pmo-intranet.json');
        $client->setScopes(Google_Service_Drive::DRIVE);
        $client->setApplicationName('pmo-intranet');
        $service = $this->service = new Google_Service_Drive($client);//

        $client->setAuthConfig(public_path().'/pmo-intranet.json');
        $client->setApplicationName('PMO Intranet');
        //$client->addScope("https://www.googleapis.com/auth/drive");
        $client->setScopes(Google_Service_Drive::DRIVE);
        $client->setRedirectUri("urn:ietf:wg:oauth:2.0:oob"); // this is so you can grab the code in the browser
        //header('Location: '. $client->createAuthUrl());exit;
//dd($client->getHttpClient());
        //$api_key = "AIzaSyDh7SRaIJxVvyyNWjw1KE_jt4GmXRbZFV4";
        //$client->setDeveloperKey($api_key);
        //$client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);


        /*if($client->isAccessTokenExpired()) {
            
            echo 'Access Token Expired';exit;
        }*
        $code = '4/Ep4cQZJJx4kAu1i_4QoM4II3rBZ2hn7VPbqYwuWyhjk';

        $client->fetchAccessTokenWithAuthCode($code);
        $client->setSubject('pmo.intranet@advanzer.com');
//dd($client->getHttpClient());

Session::push("token",$client->getAccessToken());

dd(session()->all());
        dd(session('token'));

        $service = $this->service = new Google_Service_Drive($client);

        /*foreach ($files as $file) {
            //echo($file->getMimeType() . "\n");
            var_dump($file);
            echo "  ";
        }***

        $files_list = $service->files->listFiles(array());

        if (count($files_list->getFiles()) == 0) {
            print "No files found.\n";
        } else {
            foreach ($files_list->getFiles() as $file) {
                $res['name'] = $file->getName();
                $res['id'] = $file->getId();
                $files[] = $res;
            }
            //print_r($files);
        }

        dd($files);

        exit;*/
// ---------------------------------------------------------------------------------------------------------------------
       // cloud-laravel
        //Aspose::setOutputLocation(getcwd() . "/output/");

//dd();
// ---------------------------------------------------------------------------------------------------------------------
        if(AdvEnt::isAdmin()){
            return redirect('/pmo-admin');
        }elseif(AdvEnt::isEmployed()){
            return redirect('/companies');
        }elseif(AdvEnt::isCustomer()){
            return redirect('/pmo-web/'.AdvEnt::getPMORoute());
        }

        //return View::make('main.index');
    }

    /**
     *
     *
     * @return
     */
    public function pmo_getLoginView()
    {
        return View::make('general.login');
    }

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function pmo_startSession(Request $request)
    {
        if(AdvEnt::startSession(['nickname' => $request->input('login__username'), 'password' => $request->input('login__password')])){
            return redirect('');
        }else{
            return redirect()
                ->guest('/login')
                ->with('flash_error', 'El usuario/contraseña son incorrectos.')
                ->withInput();
        }
    }

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function pmo_closeSession()
    {
        AdvEnt::closeSession();

        return redirect()->guest('/login');
    }

    /**
     * Display a menu with companies options.
     *
     * @return \Illuminate\Http\Response
     */
    public function pmo_getCompaniesView()
    {
        return View::make('general.companies');
    }

    /**
     * Display a menu business unit Advanzer/Entuizer.
     *
     * @return \Illuminate\Http\Response
     */
    public function pmo_getMenuBusinessUnitView($company = null)
    {
        $business = array();

        if($company == "advanzer"){
            $business = AdvEnt::getBusinessUnits(1);
        }elseif($company == "entuizer"){
            $business = AdvEnt::getBusinessUnits(2);
        }

        // attributes

        return View::make('main.menu',compact('business'));
    }

    /**
     * Display a window with business unit attributes.
     *
     * @return \Illuminate\Http\Response
     */
    public function pmo_getBusinessUnitAttribute(Request $request, $company = null, $businessunit = null, $attribute = null)
    {
        //$data = array();
        //dd(public_path());

        //$directory = public_path()."/PMO-Files";
        //$directory = public_path()."/PMO-Files/TEMPLATE PMO GOBIERNO";
        //$directory = "PMO-Files/TEMPLATE PMO GOBIERNO";
        //$directory = public_path()."/PMO-Files/TEMPLATE PMO GOBIERNO/010_MODELO";
        //$directory = public_path()."/PMO-Files/TEMPLATE PMO GOBIERNO/010_MODELO/ALCANCE_ORIGINAL_PROPUESTO.pptx";
        //$directory = storage_path("PMO-Files/TEMPLATE PMO GOBIERNO/010_MODELO/ALCANCE_ORIGINAL_PROPUESTO.pptx");

        //dd(resource_path("assets"));

        //dd(resource_path("assets/PMO-Files"));

        //dd(File::allFiles($directory));
        //dd(File::directories($directory));
        //dd(File::files($directory));
        //dd(File::size($directory));
        //dd(File::type($directory));
        //dd(File::extension($directory));
        //dd(File::name($directory));
        //dd(resource_path($directory));

        //dd($request->path());
        //dd(asset('PMO-Files'));

        //get current url
        $path = $request->path();

        // find element value
        $dir = AdvEnt::getBusinessUnitsAttributeValue($path);
        $link  = AdvEnt::getLink($dir['link']);
        $title = AdvEnt::getBusinessUnitAttribute($dir['attribute'])->name;

        // get path string
        $link = $link->link_format;

        //dd($dir->link_format);
        //dd(asset($dir->link_format));

        return View::make('main.window',compact('link','title'));
    }

    /**
     * Display a menu with projects of Advaner/Entuizer.
     *
     * @return \Illuminate\Http\Response
     */
    public function pmo_getMenuProjectsView(Request $request, $company = null, $businessunit = null)
    {
        $projects = AdvEnt::getProjects($request->path());
        //dd($projects);
        return View::make('main.projects',['projects' => $projects]);
    }

    /**
     * Display a window with business unit attributes.
     *
     * @return \Illuminate\Http\Response
     */
    public function pmo_getProjectAttribute(Request $request, $company = null, $businessunit = null, $project = null, $attribute = null)
    {

        //get current url
        $path = $request->path();

        // find element value
        $dir = AdvEnt::getProjectAttributeValue($path);
        $link  = AdvEnt::getLink($dir['link']);
        $title = AdvEnt::getProjectAttribute($dir['attribute'])->name;

        // get path string
        $link = $link->link_format;

        return View::make('main.window',compact('link','title'));
    }

    /**
     * Display the specified of Advaner/Entuizer project.
     *
     * @return \Illuminate\Http\Response
     */
    public function pmo_getProject(Request $request, $company = null, $businessunit = null, $project = null)
    {
        $pmoProject = AdvEnt::getPMOProject($request->path());
        //dd($project);

        $pmoAttributes = AdvEnt::getPMOAttributesProject($pmoProject->id);
        //dd($pmoAttributes);

        return View::make('main.pmo',['pmo' => $pmoAttributes]);
    }


    /**
     * Display a menu with a specified project of Advanzer.
     *
     * @return \Illuminate\Http\Response
     */
    public function pmo_getPMOWeb($company=null, $slug = null)
    {
        if(($company."/".$slug) == AdvEnt::getPMORoute()){
            return View::make('main.pmo', ['pmo' => AdvEnt::getPMO()]);
        }else {
            return redirect('');
        }
    }

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function pmo_getFoldersAndFiles(Request $request){

        $files = AdvEnt::getFoldersAndFiles($request->input('dir'));
        //$files = array("aa" => $request->input('dir'));

        return json_encode($files);
        //return $request->input('dir');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
