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
        
        $request->session()->flash('message','El usuario fue agregado con exito');
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
        dd($request);
        $data = [
            'name' => $request->input('rol-name'),
            'description' => $request->input('rol-description')
        ];
        
        Rol::create($data);

        $request->session()->flash('message','El rol fue agregado con exito');
        return redirect('pmo-admin/roles');
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
