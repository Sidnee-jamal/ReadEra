<?php

namespace App\Http\Middleware;

use Closure;
<<<<<<< Updated upstream
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }
        return response()->json(['message' => 'Forbidden. Admins only.'], 403);
=======
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            return redirect('/');
        }

        return $next($request);
>>>>>>> Stashed changes
    }
}
