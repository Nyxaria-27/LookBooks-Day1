<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // pastikan user sudah login
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // cek apakah role user sesuai dengan yang diizinkan
        if (!in_array(auth()->user()->role, $roles)) {
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    }
}
