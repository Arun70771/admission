<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;

class AdminAuth
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

        if($pp=='admin/login-panel' && Session::get('adminuser'))
        {
            return redirect('admin/home');
        }
        if($pp!="admin/login-panel" && !Session::get('adminuser'))
        {
            return redirect('admin/login-panel');
        }

        return $next($request);
    }
}
