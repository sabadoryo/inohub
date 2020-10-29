<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControlPanelController extends Controller
{
    protected $organization;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->organization = \Auth::user()
                ->organization()
                ->with('modules')
                ->first();

            view()->share('currentOrganization', $this->organization);

            return $next($request);
        });
    }

    public function controlPanel()
    {
        return view('control-panel.component', [
            'PAGE_TITLE' => 'Панель управления',
            'component' => 'control-panel',
            'breadcrumb' => [],
            'activePage' => 'control-panel'
        ]);
    }
}
