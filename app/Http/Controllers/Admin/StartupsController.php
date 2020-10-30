<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StartupsController extends Controller
{
    public function index()
    {
        $breadcrumb = [
            ['/admin', 'Главная'],
            [null, 'Стартапы']
        ];

        $bindings = [
        ];

        return view('admin.component', [
            'PAGE_TITLE' => 'Стартапы',
            'activePage' => 'startups',
            'breadcrumb' => $breadcrumb,
            'component' => 'startups-control',
            'bindings' => $bindings
        ]);
    }
}
