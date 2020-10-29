<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Module;
use App\Organization;
use Illuminate\Http\Request;

class ModulesController extends Controller
{
    public function index()
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            [null, 'Организации']
        ];

        $organizations = Organization::with('modules')->get();

        return view('admin.component', [
            'PAGE_TITLE' => 'Настройка модулей',
            'activePage' => 'modules',
            'breadcrumb' => $breadcrumb,
            'component' => 'modules-control',
            'bindings' => [
                'organizations' => $organizations,
                'modules' => Module::all(),
            ]
        ]);
    }

    public function attachModuleToOrg(Request $request)
    {
        $request->validate([
            'module_id' => 'required',
            'organization_id' => 'required',
        ]);

        $org = Organization::find($request->organization_id);

        $org->modules()->attach($request->module_id);

        return [];
    }

    public function detachModuleFromOrg(Request $request)
    {
        $request->validate([
            'module_id' => 'required',
            'organization_id' => 'required',
        ]);

        $org = Organization::find($request->organization_id);

        $org->modules()->detach($request->module_id);

        return [];
    }
}
