<?php

namespace App\Http\Middleware\AdvEnt;

use Closure;
use AdvEnt;

class AdvEmployedEnt
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //echo AdvEnt::isEmployed();
        //echo AdvEnt::hasPermissionTo($request->path());
        //echo AdvEnt::isAdmin();

        //AdvEnt::closeSession();

        //exit;

        if ((AdvEnt::isEmployed() | AdvEnt::isAdmin()) & AdvEnt::hasPermissionTo($request->path())){
            return $next($request);
        }else{
            //return redirect()->guest('');
            return redirect('/cannotAccess');
        }

    }
}
