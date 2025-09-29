<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::check()) {
            if (Auth::user()->role == "admin") {
                return redirect()->route('admin.dashboard');
            } elseif (Auth::user()->role == "user") {
                return redirect()->route('user.dashboard');
            } 
        }

        return $next($request);
    }
}
