<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$role): Response
    {

        $allowedRoles = ['admin', 'subadmin'];

        // Check if any of the provided roles exist in the allowedRoles array
        if (array_intersect($role, $allowedRoles)) {
            return $next($request);
        }

        abort(403); // forbidden
        //abort(401); //unauthorized
    }
}
