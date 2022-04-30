<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        echo 'in admin checking';
        if (!auth()->check() || !auth()->user()->accountType != 'admin') {
            echo 'user is not admin';
            return response(['message' => 'Account is not an admin'], 401);
        }
        echo 'user is admin';
        return $next($request);
    }
}
