<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use View;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('main.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pmo_getLoginView()
    {
        return View::make('general.login');
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
     * Display a menu Advanzer.
     *
     * @return \Illuminate\Http\Response
     */
    public function pmo_getMenuAdvanzerView()
    {
        return View::make('main.advanzer.menu');
    }

    /**
     * Display a menu with project of Advanzer.
     *
     * @return \Illuminate\Http\Response
     */
    public function pmo_getMenuProjectsAdvanzerView()
    {
        return View::make('main.advanzer.projects');
    }

    /**
     * Display a menu with a specified project of Advanzer.
     *
     * @return \Illuminate\Http\Response
     */
    public function pmo_getMenuProjectAdvanzerView()
    {
        return View::make('main.advanzer.project');
    }

    /**
     * Display a menu Entuizer.
     *
     * @return \Illuminate\Http\Response
     */
    public function pmo_getMenuEntuizerView()
    {
        return View::make('main.entuizer.menu');
    }

    /**
     * Display a menu with project of Entuizer.
     *
     * @return \Illuminate\Http\Response
     */
    public function pmo_getMenuProjectsEntuizerView()
    {
        return View::make('main.entuizer.projects');
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
