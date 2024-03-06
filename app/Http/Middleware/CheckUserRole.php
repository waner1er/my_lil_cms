<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;

class CheckUserRole
{
    public function handle(Request $request, Closure $next, $roles)
{
    $roles = explode(',', $roles);

    if (!Auth::user() || (!Auth::user()->hasRole('admin') && !Auth::user()->hasRole($roles))) {
        abort(403);
    }

    return $next($request);
}
}