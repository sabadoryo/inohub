<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Module;
use Illuminate\Http\Request;
use App\Permission;
use App\Role;
use Illuminate\Support\Facades\Auth;

class ACLController extends ControlPanelController
{
    public function index()
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            [null, 'ACL']
        ];
        
        $roles = Role::where('organization_id', $this->organization->id)
            ->with('permissions')
            ->withCount('users')
            ->get();
        
        $modules = $this->organization->modules()
            ->with('permissions')
            ->get();

        return view('control-panel.component', [
            'PAGE_TITLE' => 'Access control list',
            'activePage' => 'acl',
            'breadcrumb' => $breadcrumb,
            'component' => 'acl-control',
            'bindings' => [
                'roles' => $roles,
                'modules' => $modules
            ]
        ]);
    }
    
    public function addRole(Request $request)
    {
        $request->validate([
            'label' => 'required|unique:roles|min:3|max:255',
        ], [
            'label.required' => 'Введите название',
            'label.unique' => 'Название роли должно быть уникальным',
            'label.min' => 'Название роли должно быть больше :min символов',
            'label.max' => 'Название роли должно быть меньше :max символов',
        ]);
        
        $role = Role::create([
            'label' => $request->label,
            'name' => \Str::slug($request->label, '_'),
            'organization_id' => \Auth::user()->organization_id,
            'type' => \Auth::user()->organization_id ? 'organization' : 'admin',
        ]);
        $role->users_count = 0;
        $role->permissions = [];
        return ['role' => $role];
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
