<?php

namespace App\Http\Middleware;

use Closure;

class ControlPanelAuth
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
        $type = \Auth::user()->type;

        if ($type == 'organization') {
            return $next($request);
        }

        die('Permission denied');
    }
}
