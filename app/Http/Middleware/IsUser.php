<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsUser
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && !Auth::user()->is_admin) {
            return $next($request);
        }
        return response()->json(['message' => 'Forbidden. Users only.'], 403);
    }
}
