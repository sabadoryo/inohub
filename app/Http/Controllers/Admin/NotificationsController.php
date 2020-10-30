<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index(Request $request)
    {
        $query = \Auth::user()->notifications();

        if ($request->id) {
            $query->where('id', $request->id);
        }

        $notifications = $query->paginate(10);

        foreach ($notifications as $item) {
            $item->markAsRead();
        }

        return view('admin.notifications', [
            'activePage' => 'notifications',
            'breadcrumb' => [['/admin', 'Главная'], [null, 'Уведомлении']],
            'PAGE_TITLE' => 'Уведомлении',
            'notifications' => $notifications,
        ]);
    }
}
