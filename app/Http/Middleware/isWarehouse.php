<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isWarehouse
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
        // autenticate user login
        if (!auth()->check()) {
            return redirect('login');
        }

        // autenticate role user
        if (Auth::user()->role !== 'owner' && Auth::user()->role !== 'warehouse') {
            abort(403);
        }

        return $next($request);
    }
}
