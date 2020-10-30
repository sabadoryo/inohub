<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $breadcrumb = [
            ['/admin', 'Главная'],
            [null, 'Пользователи']
        ];

        $bindings = [
        ];

        return view('admin.component', [
            'PAGE_TITLE' => 'Пользователи',
            'activePage' => 'users',
            'breadcrumb' => $breadcrumb,
            'component' => 'users-control',
            'bindings' => $bindings
        ]);
    }

    public function getList(Request $request)
    {
        $query = User::where('type', 'default');

        if ($request->search) {
            $query->search($request->search);
        }

        if ($request->status == 'inactive') {
            $query->where('is_active', false);
        }

        if($request->status == 'active') {
            $query->where('is_active', true);
        }

        $result = $query->withCount('roles')
            ->paginate($request->per_page ?: 30);

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
