<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Organization;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            [null, 'Пользователи']
        ];

        $bindings = [];

        return view('control-panel.component', [
            'PAGE_TITLE' => 'Пользователи',
            'activePage' => 'users',
            'breadcrumb' => $breadcrumb,
            'component' => 'users-control',
            'bindings' => $bindings
        ]);
    }

    public function getList(Request $request)
    {
        $query = User::query()->where('is_admin', 0);

        if ($request->search) {
            $s = $request->search;

            $query->where(function ($q) use ($s) {
                $q->where(
                    \DB::raw('CONCAT_WS(" ", last_name, first_name)'),
                    'like',
                    '%' . $s .'%'
                )->orWhere('email', $s)
                    ->orWhere('phone', $s);
            });
        }
        
        if ($request->status == 'inactive') {
            $query->where('is_active', false);
        } elseif($request->status == 'active') {
            $query->where('is_active', true);
        }

        $result = $query->with(['roles', 'organization'])->withCount('roles')->paginate($request->per_page ?: 30);

        return $result;
    }
    
    public function changeActive($id)
    {
        $user = User::find($id);
        
        $user->update([
            'is_active' => !$user->is_active,
        ]);
    }
}
