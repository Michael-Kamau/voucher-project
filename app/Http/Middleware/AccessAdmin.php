<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class AccessAdmin
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

            if( Auth::user()->hasAnyRoles(['admin','user'])){
                return $next($request);
            }
            return redirect('user');

    }
}
