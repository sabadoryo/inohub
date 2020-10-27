<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function index()
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            [null, 'Участники AstanaHub']
        ];

        return view('control-panel.component', [
            'component' => 'members-control',
            'bindings' => [],
            'PAGE_TITLE' => 'Участники AstanaHub',
            'activePage' => 'members',
            'breadcrumb' => $breadcrumb,
        ]);
    }
}
