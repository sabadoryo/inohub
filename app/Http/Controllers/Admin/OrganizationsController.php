<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Organization;
use App\User;
use Faker\ORM\Spot\EntityPopulator;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;
use Illuminate\Support\Collection;

class OrganizationsController extends Controller
{
    // todo add address, email, phone, logo, image, team ...

    public function index()
    {
        $organizations = Organization::all();

        foreach ($organizations as $organization) {
            $organization->admins = $organization->users->where('is_admin', 1);
        }

        $breadcrumb = [
            ['/admin', 'Главная'],
            [null, 'Организации']
        ];

        $bindings = [
            'organizations' => $organizations
        ];

        return view('admin.component', [
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
            ['/admin', 'Главная'],
            [null, 'Организации']
        ];

        $bindings = [
            'organizations' => $organizations
        ];

        return view('admin.component', [
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
            ['/admin', 'Главная'],
            ['/admin/organizations', 'Организации'],
            [null, $organization->name]
        ];

        $bindings = [
            'organization' => $organization
        ];

        return view('admin.component', [
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

    public function getUsersByFragment(Request $request)
    {
        $query = User::query();

        $users = $query->search($request->fragment)->limit(10)->get();

        return ['users' => $users];
    }

    public function setAdmins(Request $request, $id)
    {
        $request->validate([
            'adminIds' => 'required|array',
            'adminIds.*' => 'nullable|numeric'
        ]);

        $organization = Organization::findOrFail($id);

        $admins = $organization->users->where('is_admin', 1);

        foreach ($admins as $admin) {
            $admin->organization_id = null;
            $admin->type = 'default';
            $admin->save();
        }

        if (count($request->adminIds)) {
            $users = User::whereIn('id', $request->adminIds)->get();
            foreach ($users as $user) {
                $user->organization_id = $organization->id;
                $user->type = 'organization';
                $user->save();
            }

            return ['admins' => $users];
        } else {
            return ['admins' => []];
        }

    }
}
