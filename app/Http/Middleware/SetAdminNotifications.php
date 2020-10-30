<?php

namespace App\Http\Middleware;

use Closure;

class SetAdminNotifications
{
    public function handle($request, Closure $next)
    {
        $unreadNotificationsCount = \Auth::user()->unreadNotifications()->count();

        $topNotifications = \Auth::user()->unreadNotifications()
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        view()->share('unreadNotificationsCount', $unreadNotificationsCount);
        view()->share('topNotifications', $topNotifications);
        
        return $next($request);
    }
}
