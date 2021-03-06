<?php

namespace App\Http\Middleware;

use Closure;

class checkAdmin
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
        if(auth()->check() && auth()->user()->hasAnyRoles(['admin','superAdmin'])) {
            return $next($request);
        }else
        {
            alert()->error('Error!','You have no access to this!');
            return redirect(route('dashboard'));
        }

    }

}
