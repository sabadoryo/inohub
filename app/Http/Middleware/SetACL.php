<?php

namespace App\Http\Middleware;

use Closure;

class SetACL
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->expectsJson()) {
            $roles = null;
            $permissions = null;

            if (\Auth::user()) {
                $roles = \Auth::user()->getRoleNames();
                $permissions = \Auth::user()->getPermissionNames();
            }

            view()->share('AUTH_ROLES', $roles);
            view()->share('AUTH_PERMISSIONS', $permissions);
        }

        return $next($request);
    }
}
