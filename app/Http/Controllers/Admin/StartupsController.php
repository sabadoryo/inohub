<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Startup;
use Illuminate\Http\Request;

class StartupsController extends Controller
{
    public function index(Request $request)
    {
        $breadcrumb = [
            ['/admin', 'Главная'],
            [null, 'Стартапы']
        ];

        $bindings = [
            'input-id' => $request->id
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

        if ($request->id) {
            $query->where('id', $request->id);
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->project) {
            $query->where('project_name', 'like', '%' . $request->project . '%');
        }

        if ($request->companyNameOrBIN) {
            $query->search($request->companyNameOrBIN);
        }

        $result = $query->with('user')
            ->paginate($request->per_page ?: 30);

        return $result;
    }

    public function accept($id)
    {
        $startup = Startup::findOrFail($id);

        $startup->update([
            'status' => 'accepted',
        ]);

        return [];
    }

    public function reject($id)
    {
        $startup = Startup::findOrFail($id);

        $startup->update([
            'status' => 'rejected',
        ]);

        return [];
    }
}
