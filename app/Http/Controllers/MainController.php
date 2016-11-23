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
use AdvEnt;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$client = new Google_Client();
        //$client->setAuthConfig(Mage::getBaseDir('etc') . '/PMO-Intranet-942863ddf80d.json');
        $client->setAuthConfig(public_path().'/PMO-Intranet-942863ddf80d.json');
        $client->setScopes(Google_Service_Drive::DRIVE);
        $client->setApplicationName('pmo-intranet');
        $service = $this->service = new Google_Service_Drive($client);
        $files_list = $service->files->listFiles(array());

        dump($service->files->listFiles(array()));
        //dump($files_list);

        /*foreach ($files as $file) {
            //echo($file->getMimeType() . "\n");
            var_dump($file);
            echo "  ";
        }***

        if (count($files_list->getFiles()) == 0) {
            print "No files found.\n";
        } else {
            foreach ($files_list->getFiles() as $file) {
                $res['name'] = $file->getName();
                $res['id'] = $file->getId();
                $files[] = $res;
            }
            print_r($files);
        }

        exit;*/


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
     * Display a menu with projects of Advaner/Entuizer.
     *
     * @return \Illuminate\Http\Response
     */
    public function pmo_getMenuProjectsView(Request $request, $company = null, $businessunit = null, $category = null)
    {
        $projects = AdvEnt::getMenuProjects($request->path());
        //dd($projects);
        return View::make('main.projects',['projects' => $projects]);
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
