<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Module;
use Illuminate\Http\Request;
use App\Permission;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Psy\Util\Str;

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
            'label' => 'required|min:3|max:255',
        ], [
            'label.required' => 'Введите название',
            'label.min' => 'Название роли должно быть больше :min символов',
            'label.max' => 'Название роли должно быть меньше :max символов',
        ]);
        
        $organization_id = \Auth::user()->organization_id;
        $name = \Str::slug($request->label, '_') . "_" . $organization_id;
        
        $item = Role::where('name', $name)->first();
        if ($item) {
            return response()->json(['errors' => ['label' => [0 => 'Такое имя уже существует']], 'message' => 'The given data was invalid.'], 422);
        }
        
        $role = Role::create([
            'label' => $request->label,
            'name' => $name,
            'organization_id' => $organization_id,
            'type' => 'organization',
        ]);

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
