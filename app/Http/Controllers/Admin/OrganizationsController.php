<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Organization;
use Illuminate\Http\Request;

class OrganizationsController extends Controller
{
    public function index()
    {
        $component = 'organizations-control';

        $organizations = Organization::all();

        $bindings = [
            'organizations' => $organizations
        ];

        return view(
            'admin.component',
            compact('component', 'bindings')
        );
    }

    public function create()
    {
        $countries = getCountriesList();

        $component = 'organization-create-form';

        $bindings = [
            'countries' => json_encode($countries),
        ];

        return view(
            'admin.component',
            compact('component', 'bindings')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'country_code' => 'required|string',
            'city_code' => 'required|string',
            'logo' => 'required|image'
        ]);

        $logoPath = $request->file('logo')
            ->store('organization_logotypes', 'public');

        $organization = Organization::create([
            'name' => $request->name,
            'country_code' => $request->country_code,
            'city_code' => $request->city_code,
            'logo_path' => $logoPath
        ]);

        return ['id' => $organization->id];
    }

    public function show($id)
    {
        $organization = Organization::find($id);

        $component = 'organization-form';

        $bindings = [
            'organization' => $organization
        ];

        return view(
            'admin.component',
            compact('component', 'bindings')
        );
    }

}
