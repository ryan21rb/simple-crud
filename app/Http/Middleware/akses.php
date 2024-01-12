<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class akses
{
    public function handle($request, Closure $next, ...$roles)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if roles are specified
            if (empty($roles)) {
                // No roles specified, allow access
                return $next($request);
            }

            // Check if the user's role matches any allowed roles
            $user = Auth::user();

            // Check if the user's role is admin
            if ($user->role == 'admin') {
                // Admin has access to all specified roles, allow access
                return $next($request);
            }

            // Check if the user's role matches any specified roles
            foreach ($roles as $role) {
                if ($user->role == $role) {
                    // User has the required role, allow access
                    return $next($request);
                }
            }
        }

        // User doesn't have the required role, redirect or handle accordingly
        return redirect()->route('login')->withErrors('Invalid Role Or Not Authenticated');
    }
}
