<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControlPanelController extends Controller
{
    public function index()
    {
        $component = 'control-panel';

        view()->share('PAGE_TITLE', 'Панель управления');

        return view(
            'control-panel.component',
            compact('component')
        );
    }
}
