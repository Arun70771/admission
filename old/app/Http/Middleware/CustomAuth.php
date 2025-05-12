<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;

class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $pp = $request->path();

        if($pp=='SignIn' && Session::get('user'))
        {
            return redirect('step1');
        }
        if($pp!="SignIn" && !Session::get('user'))
        {
            return redirect('SignIn');
        }

        return $next($request);
    }
}
