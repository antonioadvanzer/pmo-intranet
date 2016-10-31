<?php

namespace App\Http\Middleware\AdvEnt;

use Closure;
use AdvEnt;

class AdvPartnerEnt
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
        if (!AdvEnt::checkUser())
        {
            return redirect()->guest('/login');
        }

        return $next($request);
    }
}
