<?php

namespace App\Http\Middleware\AdvEnt;

use Closure;
use AdvEnt;

class AdvAdminEnt
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
        if (!AdvEnt::isAdmin())
        {
            return redirect()->guest('');
        }

        return $next($request);
    }
}
