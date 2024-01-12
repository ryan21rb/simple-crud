<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Session
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the user's role is admin or staff
            $user = Auth::user();

            if ($user->role == 'admin' || $user->role == 'staff') {
                // Add cache control headers to prevent caching
                $response = $next($request);
                $response->header('Cache-Control', 'no-cache, no-store, must-revalidate');
                $response->header('Pragma', 'no-cache');
                $response->header('Expires', '0');

                return $response;
            }
        }

        // If not authenticated or not the right role, redirect to login
        return redirect()->route('login')->withErrors('Invalid role or not authenticated');
    }
}
