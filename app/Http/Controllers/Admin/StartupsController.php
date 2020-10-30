<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Startup;
use Illuminate\Http\Request;

class StartupsController extends Controller
{
    public function index()
    {
        $breadcrumb = [
            ['/admin', 'Главная'],
            [null, 'Стартапы']
        ];

        $bindings = [
        ];

        return view('admin.component', [
            'PAGE_TITLE' => 'Стартапы',
            'activePage' => 'startups',
            'breadcrumb' => $breadcrumb,
            'component' => 'startups-control',
            'bindings' => $bindings
        ]);
    }

    public function getList(Request $request)
    {
        $query = Startup::query();

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->project) {
            $query->where('project_name', 'like', '%'.$request->project.'%');
        }

        if ($request->companyNameOrBIN) {
            $query->search($request->companyNameOrBIN);
        }

        $result = $query->withCount('roles')
            ->paginate($request->per_page ?: 30);

        return $result;
    }
}
