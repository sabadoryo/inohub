<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Permission;
use App\Role;

class ACLController extends Controller
{
    public function index()
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            [null, 'ACL']
        ];

        $roles = Role::with('permissions')->get();

        $permissions = Permission::all();

        return view('control-panel.component', [
            'PAGE_TITLE' => 'Access control list',
            'activePage' => 'acl',
            'breadcrumb' => $breadcrumb,
            'component' => 'acl-control',
            'bindings' => [
                'roles' => $roles,
                'permissions' => $permissions
            ]
        ]);
    }

    public function attachPermissionToRole(Request $request)
    {
        $request->validate([
            'role_id' => 'required',
            'permission_id' => 'required'
        ]);

        $role = Role::find($request->role_id);

        $permission = Permission::find($request->permission_id);

        $role->givePermissionTo($permission);

        return [];
    }

    public function detachPermissionFromRole(Request $request)
    {
        $request->validate([
            'role_id' => 'required',
            'permission_id' => 'required'
        ]);

        $role = Role::find($request->role_id);

        $permission = Permission::find($request->permission_id);

        $role->revokePermissionTo($permission);

        return [];
    }
}
