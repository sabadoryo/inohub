<?php

namespace App\Http\Controllers\ControlPanel;

use App\Application;
use App\Http\Controllers\Controller;
use App\Organization;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    public function index()
    {
        $organizations = Organization::all();

        $breadcrumb = [
            ['/control-panel', 'Главная'],
            [null, 'Заявки']
        ];

        $bindings = [
            'organizations' => $organizations
        ];

        return view('control-panel.component', [
            'PAGE_TITLE' => 'Заявки',
            'activePage' => 'applications',
            'breadcrumb' => $breadcrumb,
            'component' => 'applications-control',
            'bindings' => $bindings
        ]);
    }

    public function getList(Request $request)
    {
        $query = Application::query();

        $result = $query->with('user', 'entity', 'manager')->paginate();

        return $result;
    }

    public function show($id)
    {
        $application = Application::findOrFail($id);
        $application->entity;
        $application->user;
        $application->manager;

        $title = 'Заявка №' . $application->id;

        $breadcrumb = [
            ['/control-panel', 'Главная'],
            ['/control-panel/applications', 'Заявки'],
            [null, $title]
        ];

        $bindings = [
            'application' => $application
        ];

        return view('control-panel.component', [
            'PAGE_TITLE' => $title,
            'activePage' => 'applications',
            'breadcrumb' => $breadcrumb,
            'component' => 'application-manage',
            'bindings' => $bindings
        ]);
    }

    public function takeForProcessing($id)
    {
        $app = Application::findOrFail($id);
        $app->manager_id = \Auth::user()->id;
        $app->status = 'processing';
        $app->save();

        return [];
    }

    public function reply(Request $request, $id)
    {
        $app = Application::find($id);

        if ($request->action == 'accept') {
            $app->status = 'accepted';
        }

        if ($request->status == 'reject') {
            $app->status = 'rejected';
        }

        if ($request->status == 'to-remake') {
            $app->status = 'to-remake';
        }

        $app->save();


        return [];
    }
}
