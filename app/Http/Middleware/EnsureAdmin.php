<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            // Redirect the user to the login page if they are not authenticated
            return redirect('/login');
        }

        // Check if the user has an admin role (role = 1)
        if (Auth::user()->role !== 1) {
            // Log out the non-admin user and destroy the session if they are not an admin
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // Redirect the user to another page (e.g., home or /admin)
            return redirect('/admin')->with('error', 'You do not have admin access.');
        }

        // Proceed if the user is logged in and has the admin role
        return $next($request);
    }
}
