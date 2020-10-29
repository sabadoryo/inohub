<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Organization;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class AdminUsersController extends ControlPanelController
{
    public function index(Request $request)
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            [null, 'Сотрудники']
        ];
        
        $roles = $this->organization->roles;
        
        $bindings = [
            'roles' => $roles,
        ];
        
        return view('control-panel.component', [
            'PAGE_TITLE' => 'Сотрудники',
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
}
