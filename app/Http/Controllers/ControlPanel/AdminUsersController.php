<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Organization;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class AdminUsersController extends ControlPanelController
{
    public function index()
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            [null, 'Персонал сайта']
        ];
        
        $roles = $this->organization->roles;
        
        $bindings = [
            'roles' => $roles,
        ];
        
        return view('control-panel.component', [
            'PAGE_TITLE' => 'Персонал сайта',
            'activePage' => 'admin-users',
            'breadcrumb' => $breadcrumb,
            'component' => 'admin-users-control',
            'bindings' => $bindings
        ]);
    }
    
    public function getList(Request $request)
    {
        $query = $this->organization->users();

        if ($request->search) {
            $query->search($request->search);
        }

        if ($request->role_id) {
            $query->whereHas('roles', function ($q) use ($request) {
                $q->where('id', $request->role_id);
            });
        }
        
        if ($request->status == 'inactive') {
            $query->where('is_active', false);
        }

        if ($request->status == 'active') {
            $query->where('is_active', true);
        }
        
        $result = $query->with(['roles'])->paginate(10);
        
        return $result;
    }
    
    public function updateRoles(Request $request, $id)
    {
        $user = User::find($id);
        $user->update([
            'is_active' => $request->is_active,
        ]);
        $user->syncRoles($request->roles_id);
        
        return ['roles' => $user->roles, 'is_active' => $user->is_active];
    }
}
