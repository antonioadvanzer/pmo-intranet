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
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests;
use View;
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
        return View::make('admin.users.new_user',["type_user" => TypeUser::all(), "companies" => Company::all(), "rol" => Rol::all(), "project" => Project::all()]);
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
        $var = $request->input('first-name')." ".$request->input('last-name')." ".$request->input('nick-name')." ".$request->input('email')." ".$request->input('password')." ".$request->input('type')." ".$request->input('company')." ".$request->input('rol')." ".$request->input('pmo');
        dd($var);
//continue
        User::create(
            [
                "name" => $request->input('first-name')
            ]
        );
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
