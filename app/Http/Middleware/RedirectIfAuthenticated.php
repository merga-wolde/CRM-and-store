<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
           
            if( Auth::guard($guard)->check() && Auth::user()->role == 1){
                return redirect()->route('admin.dashboard');
            }
            elseif( Auth::guard($guard)->check() && Auth::user()->role == 2){
                return redirect()->route('client.dashboard');
            }
        }

        return $next($request);
    }
}
