<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and their role is 'admin'
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); // Allow access for admins
        }

        // Redirect non-admin users
        return redirect('/dashboard')->with('error', 'Access denied. You must be an admin.');
    }
}
