<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('admin')->check()) {
            return $next($request);
        }

        // Redirect to admin login page if not authenticated
        return redirect()->route('admin.login')->with('error', 'Please log in to access the dashboard.');
    }
}
