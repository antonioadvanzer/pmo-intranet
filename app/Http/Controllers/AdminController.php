<?php
/*
    Company: Advanzer S.A de C.V.
    Author: Antonio Báez
*/
namespace App\Http\Controllers;

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
use Illuminate\Http\Request;
use App\Http\Requests;
use View;
use Validator;
use Redirect;
use Hash;
use File;
use DB;
use AdvEnt;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('admin.index');
    }

    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getUsers()
    {
        return View::make('admin.users.users',["users" => Users::all()]);
    }

    /**
     * Display a listing of the roles.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getRoles()
    {
        return View::make('admin.roles.roles',["roles" => Rol::all()]);
    }
    
    /**
     * Display a listing of the business units.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getBusinesUnit()
    {
        return View::make('admin.business_units.business_units',["business_unit" => BusinessUnit::all()]);
    }

    /**
     * Display a listing of the business units attributes.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getBusinesUnitAttributes()
    {
        return View::make('admin.business_units.business_units_attributes',["business_unit_attributes" => BusinessUnitAttribute::all()]);
    }

    /**
     * Display a listing of the projects.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getProjects()
    {
        return View::make('admin.projects.projects',["projects" => Project::all()]);
    }

    /**
     * Display a listing of the projects attributes.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getProjectsAttributes()
    {
        return View::make('admin.projects.projects_attributes',["projects_attributes" => ProjectAttribute::all()]);
    }

    /**
     * Display a listing of the PMO Templeates.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getPMOTemplate()
    {
        return View::make('admin.pmo.pmo_templates',["pmo_templates" => PMOCategory::all()]);
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
     * Display the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getFormNewUser()
    {
        return View::make('admin.users.new_user',["type_user" => TypeUser::all(), "companies" => Company::all(), "rol" => Rol::all()]);
    }

    /**
     * Display the form for creating a new rol.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getFormNewRol()
    {
        return View::make('admin.roles.new_rol');
    }

    /**
     * Display the form for creating a new business unit.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getFormNewBusinessUnit()
    {
        return View::make('admin.business_units.new_business_unit',["companies" => Company::all(), "attributes" => BusinessUnitAttribute::all()]);
    }

    /**
     * Display the form for creating a new business unit attribute.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getFormNewBusinessUnitAttribute()
    {
        return View::make('admin.business_units.new_business_unit_attribute');
    }

    /**
     * Display the form for creating a new project.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getFormNewProject()
    {
        return View::make('admin.projects.new_project',["companies" => Company::all(), "pmo" => PMOCategory::all(), "attributes" => ProjectAttribute::all()]);
    }

    /**
     * Display the form for creating a new business unit attribute.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getFormNewProjectAttribute()
    {
        return View::make('admin.projects.new_project_attribute');
    }

    /**
     * Display the form for creating a new business unit attribute.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_getFormNewPMO()
    {
        return View::make('admin.pmo.new_pmo_template');
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
     * Store a user created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin_storeNewUser(Request $request)
    {
        $type = null;
        $data = [
            'name' => $request->input('first-name'),
            'last_name' => $request->input('last-name'),
            'nickname' => $request->input('nick-name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'type' => $type = $request->input('type')
        ];

        switch($type){
            case "1":
                $data['rol'] = $request->input('rol');
            break;
            case "2":
                $data['company'] = $request->input('company');
                $data['rol'] = $request->input('rol');
            break;
            case "3":
                $data['company'] = $request->input('company');
                $data['pmo'] = $request->input('pmo');
            break;
        }
        //dd($data);
        
        // do the validation ----------------------------------
        // validate against the inputs from our form
        $validator = Validator::make($data, Users::$rules, Users::$messages);

        // check if the validator failed -----------------------
        if($validator->fails()) {

            // get the error messages from the validator
            $messages = $validator->messages();

            // redirect our user back to the form with the errors from the validator
            return Redirect::to('pmo-admin/newUser')
                ->withErrors($validator)
                ->withInput();

        }else{
            // validation successful ---------------------------

            // our user has passed some tests!
            // let him enter the database

            Users::create($data);
        }

        //$request->session()->flash('alert-success', 'Usuario fue agregado con exito');
        //return Redirect::to('pmo-admin/users')->withSuccess('Usuario fue agregado con exito');
        
        $request->session()->flash('message','El Usuario fue agregado con exito');
        return redirect('pmo-admin/users');
    }

     /**
     * Store a user created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin_storeNewRol(Request $request)
    {   
        DB::beginTransaction();
        
        $permission = array();
        for($i = 1; $i <= $request->input('cE'); $i++){
            
            if(!empty($request->input('sc'.$i))){
                $permission['permision'.$i] = [
                            'company' => $request->input('sc'.$i),
                            'business_unit' => $request->input('sbu'.$i),
                            'project' => $request->input('sp'.$i),
                            'business_unit_attribute' => $request->input('abu'.$i),
                            'project_attribute' => $request->input('ap'.$i),
                            'permission' => ['c' => $request->input('p_create'.$i),
                                            'r' => $request->input('p_read'.$i),
                                            'u' => $request->input('p_update'.$i),
                                            'd' => $request->input('p_delete'.$i),]
                        ];
            }
        }
        
        //$data['permission'] = $permission;

        //dd($permission);

        $data = [
            'name' => $request->input('rolName'),
            'description' => $request->input('rolDescription')
        ];

        $rol = Rol::create($data);
        $idRol = $rol->id;

        foreach($permission as $p){
            Permission::create([
                'rol' => $idRol,
                'C' => (($c = $p['company']) == "null" ? null : $c),
                'BU' => (($c = $p['business_unit']) == "null" ? null : $c),
                'P' => (($c = $p['project']) == "null" ? null : $c),
                'ABU' => (($c = $p['business_unit_attribute']) == "true" ? true : false),
                'AP' => (($c = $p['project_attribute']) == "true" ? true : false),
                'create' => (($p['permission']['c']) == "true" ? true : false),
                'read' => (($p['permission']['r']) == "true" ? true : false),    
                'update' => (($p['permission']['u']) == "true" ? true : false),
                'delete' => (($p['permission']['d']) == "true" ? true : false),
                
            ]);
        }

        DB::commit();

        $request->session()->flash('message','El Rol fue agregado con exito');
        return redirect('pmo-admin/roles');
    }

    /**
     * Store a user created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin_storeNewBusinessUnit(Request $request)
    {   
        DB::beginTransaction();

        $type = null;
        $data = [
            'name' => $request->input('bu-name'),
            'description' => $request->input('bu-description'),
            'company' => $request->input('bu-company'),
            'icon' => $request->input('bu-icon')
        ];

        //dd($request);
        //dd($data);
        //dd(BusinessUnitAttribute::count());
        //dd($request->input('2'));
        //$bua = BusinessUnitAttribute::count();
        
        $nbu = BusinessUnit::create($data);

        $dir_bu = 'PMO-Files/BUSINESS_UNITS/'.$data['name'];
        
        $directory = File::makeDirectory($dir_bu, 0777);
        
        $bua = BusinessUnitAttribute::all();

        foreach($bua as $b){
            if($request->input(''.$b->id) == "on"){
                $dir_bu_attr = $dir_bu.'/'.$b->name;
                File::makeDirectory($dir_bu_attr, 0777);
                $dir = GDLink::create(['link_format' => $dir_bu_attr]);
                BusinessUnitAttributeValue::create(['business_unit' => $nbu->id, 'business_unit_attribute' => $b->id, 'link' => $dir->id]);
            }
        }
        
        DB::commit();

        $request->session()->flash('message','La Unidad de Negocio fue agregado con exito');
        return redirect('pmo-admin/business_units');
    }

    /**
     * Store a user created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin_storeNewBusinessUnitAttribute(Request $request)
    {
        $type = null;
        $data = [
            'name' => $request->input('bua-name'),
            'description' => $request->input('bua-description')
        ];

        $nbu = BusinessUnitAttribute::create($data);
        
        $request->session()->flash('message','El Atributo fue agregado con exito');
        return redirect('pmo-admin/business_units_attributes');
    }

    /**
     * Store a user created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin_storeNewProject(Request $request)
    {   
        DB::beginTransaction();

        $type = null;
        $data = [
            'name' => $request->input('pro-name'),
            'description' => $request->input('pro-description'),
            'client' => $request->input('pro-client'),
            'objective' => $request->input('pro-objective'),
            'scope' => $request->input('pro-scope'),
            'status' => ($request->input('pro-status') == "1" ? true : false),
            'progress' => $request->input('pro-progress'),
            'business_unit' => $request->input('pro-businessunit')
        ];

        $npro = Project::create($data);

        $dir_pro = 'PMO-Files/PROJECTS/'.$data['name'];

        $directory = File::makeDirectory($dir_pro, 0777);
        
        $dir_attr = File::makeDirectory($dir_pro."/ATTRIBUTES", 0777);
        
        $proa = ProjectAttribute::all();

        foreach($proa as $p){
            if($request->input(''.$p->id) == "on"){
                $dir_pro_attr = $dir_pro.'/ATTRIBUTES/'.$p->name;
                File::makeDirectory($dir_pro_attr, 0777);
                $dir = GDLink::create(['link_format' => $dir_pro_attr]);
                ProjectAttributeValue::create(['project' => $npro->id, 'project_attribute' => $p->id, 'link' => $dir->id]);
            }
        }
        
        $pmo_template = PMOCategory::where(["id" => $request->input('pro-pmo')])->first();

        $pmo_template_attributes = $pmo_template->getPmoAttributes()->get();
        
        $pmo_project = PMOProject::create(["project" => $npro->id, "pmo_category" => $pmo_template->id]);

        $dir_attr = File::makeDirectory($dir_pro."/PMO", 0777);

        foreach($pmo_template_attributes as $pmo){
            $dir_pro_pmo_attr = $dir_pro.'/PMO/'.$pmo->name;
            File::makeDirectory($dir_pro_pmo_attr, 0777);
            $dir = GDLink::create(['link_format' => $dir_pro_pmo_attr]);
            PMOProjectAttribute::create(["pmo_project" => $pmo_project->id, "pmo_attribute" => $pmo->id, 'link' => $dir->id]);
        }

        DB::commit();

        $request->session()->flash('message','El Proyecto fue agregado con exito');
        return redirect('pmo-admin/projects');
    }

    /**
     * Store a user created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin_storeNewProjectAttribute(Request $request)
    {
        $type = null;
        $data = [
            'name' => $request->input('proa-name'),
            'description' => $request->input('proa-description')
        ];

        $nbu = ProjectAttribute::create($data);
        
        $request->session()->flash('message','El atributo fue agregado con exito');
        return redirect('pmo-admin/projects_attributes');
    }

    /**
     * Store a user created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin_storeNewPMOTemplate(Request $request)
    {//dd($request);

        DB::beginTransaction();

        $attr = array();
        for($i = 1; $i <= $request->input('cE'); $i++){
            
            if(!empty($request->input('attrN'.$i))){
                $attr['attr'.$i] = [
                            'name' => $request->input('attrN'.$i),
                            'icon' => $request->input('attrI'.$i)
                        ];
            }
        }
        
        $data = [
            'name' => $request->input('templateName')
        ];

        $pmo = PMOCategory::create($data);
        $idPMO = $pmo->id;

        foreach($attr as $a){
            PMOAttribute::create(['name' => $a['name'], 'icon' => $a['name'],'pmo_category' => $idPMO]);
        }
        
        DB::commit();

        $request->session()->flash('message','La Plantilla PMO fue agregada con exito');
        return redirect('pmo-admin/pmo_templates');
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

    /**
     * Get specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin_getCompanies(Request $request)
    {
        $resources = Company::all();

        return json_encode($resources);
    }

    /**
     * Get specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin_getArrayBusinessUnits(Request $request)
    {
        $resources = BusinessUnit::where(["company" => $request->input('id')])->get();

        return json_encode($resources);
    }

    /**
     * Get specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin_getArrayProjects(Request $request)
    {
        $resources = Project::where(["business_unit" => $request->input('id')])->get();

        return json_encode($resources);
    }

}
