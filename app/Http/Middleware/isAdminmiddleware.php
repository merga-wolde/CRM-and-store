<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\http\Request;

use Illuminate\Support\Facades\Auth;

class isAdminmiddleware
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
        //return $next($request);
        if (Auth::check() && Auth::user()->role == 1){
            return $next($request);
        }
        else
            return redirect()->route('login');
    }
}
