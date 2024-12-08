<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Get the user's role from the database
        $userRole = Auth::user()->role;

        // Check if the user's role matches the required role
        if ($userRole !== $role) {
            abort(403, 'Unauthorized access');
        }

        return $next($request);
    }
}
