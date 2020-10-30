<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index()
    {
//        $notifications = \Auth::user()->notifications()->get();
//        dd($notifications);
        $component = 'cabinet-notifications';
    
        return view('cabinet-component', [
            'component' => $component,
            'activeTab' => 'notifications',
            'bindings' => [
            ],
        ]);
    }
    
    public function getList()
    {
        $notifications = \Auth::user()->notifications()->get();
        
        return [
            'notifications' => $notifications,
        ];
    }
}
