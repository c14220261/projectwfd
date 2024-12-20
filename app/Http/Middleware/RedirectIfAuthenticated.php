<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string|null  ...$guards
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        // Check if the user is authenticated using any guard
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Redirect to dashboard if authenticated
                return redirect('/dashboard');
            }
        }

        // Continue with the request if the user is not authenticated
        return $next($request);
    }
}
