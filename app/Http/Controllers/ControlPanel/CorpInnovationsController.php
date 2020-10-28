<?php

namespace App\Http\Controllers\ControlPanel;

use App\CorpTask;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CorpInnovationsController extends Controller
{
    public function index()
    {
        return view('control-panel.component', [
            'component' => 'corp-innovations',
            'bindings' => [],
            'PAGE_TITLE' => 'Корпоративные инновации',
            'activePage' => 'crop-innovations',
            'breadcrumb' => [
                ['/control-panel', 'Главная'],
                ['/control-panel/corp-innovations', 'Корп ']
            ],
        ]);
    }

    public function getTasksList(Request $request)
    {
        $query = CorpTask::query();

        return $query->orderBy('id', 'desc')
            ->paginate(10);
    }

    public function task($id)
    {
    }
}
