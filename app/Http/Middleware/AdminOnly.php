<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminOnly
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->get('is_admin')) {
            abort(403, 'Unauthorized: Admins only.');
        }

        return $next($request);
    }
}
