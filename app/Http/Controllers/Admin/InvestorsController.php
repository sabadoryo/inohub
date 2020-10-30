<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Investor;
use Illuminate\Http\Request;

class InvestorsController extends Controller
{
    public function index(Request $request)
    {
        $breadcrumb = [
            ['/admin', 'Главная'],
            [null, 'Инвесторы']
        ];

        return view('admin.component', [
            'PAGE_TITLE' => 'Инвесторы',
            'activePage' => 'investors',
            'breadcrumb' => $breadcrumb,
            'component' => 'investors-control',
            'bindings' => []
        ]);
    }

    public function getList(Request $request)
    {
        $query = Investor::query();

        if ($request->search) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->search($request->search);
            });
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $investors = $query->with('user')->paginate(20);

        return $investors;
    }

    public function accept(Request $request, $id)
    {
        $investor = Investor::findOrFail($id);

        $investor->status = 'accepted';
        $investor->save();

        return [];
    }

    public function reject(Request $request, $id)
    {
        $investor = Investor::findOrFail($id);

        $investor->status = 'rejected';
        $investor->save();

        return [];
    }

}
