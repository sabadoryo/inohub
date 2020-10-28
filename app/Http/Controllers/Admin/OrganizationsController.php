<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Organization;
use Illuminate\Http\Request;

class OrganizationsController extends Controller
{
    // todo add address, email, phone, logo, image, team ...

    public function index()
    {
        $organizations = Organization::all();

        $breadcrumb = [
            ['/control-panel', 'Главная'],
            [null, 'Организации']
        ];

        $bindings = [
            'organizations' => $organizations
        ];

        return view('control-panel.component', [
            'PAGE_TITLE' => 'Организации',
            'activePage' => 'organizations',
            'breadcrumb' => $breadcrumb,
            'component' => 'organizations-control',
            'bindings' => $bindings
        ]);
    }

    public function create()
    {
        $organizations = Organization::all();

        $breadcrumb = [
            ['/control-panel', 'Главная'],
            [null, 'Организации']
        ];

        $bindings = [
            'organizations' => $organizations
        ];

        return view('control-panel.component', [
            'PAGE_TITLE' => 'Организации',
            'activePage' => 'organizations',
            'breadcrumb' => $breadcrumb,
            'component' => 'organization-create-form',
            'bindings' => $bindings
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

//        $logoPath = $request->file('logo')
//            ->store('organization_logotypes', 'public');

        $organization = Organization::create([
            'name' => $request->name,
        ]);

        return ['id' => $organization->id];
    }

    public function edit($id)
    {
        $organization = Organization::findOrFail($id);

        $breadcrumb = [
            ['/control-panel', 'Главная'],
            ['/control-panel/organizations', 'Организации'],
            [null, $organization->name]
        ];

        $bindings = [
            'organization' => $organization
        ];

        return view('control-panel.component', [
            'PAGE_TITLE' => 'Редактирование данных организации',
            'activePage' => 'organizations',
            'breadcrumb' => $breadcrumb,
            'component' => 'organization-edit-form',
            'bindings' => $bindings
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $organization = Organization::findOrFail($id);
        $organization->name = $request->name;
        $organization->save();

        return [];
    }
}
