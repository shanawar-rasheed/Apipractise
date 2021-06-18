<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;



class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check())
        return $next($request);
        return redirect('login')->with('fail','You Must LogIn First to Access That page');
            
    }
}
