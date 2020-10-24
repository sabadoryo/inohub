<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControlPanelController extends Controller
{
    public function index()
    {
        return view('control-panel.component', [
            'PAGE_TITLE' => 'Панель управления',
            'component' => 'control-panel',
            'breadcrumb' => [],
            'activePage' => 'control-panel'
        ]);
    }
}
