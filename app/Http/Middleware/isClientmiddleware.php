<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\http\Request;

use Illuminate\Support\Facades\Auth;

class isClientmiddleware
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
        if (Auth::check() && Auth::user()->role == 2){
            return $next($request);
        }
        else
            return redirect()->route('login');
    }
}
