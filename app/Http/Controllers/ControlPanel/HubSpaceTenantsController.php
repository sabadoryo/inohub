<?php

namespace App\Http\Controllers\ControlPanel;

use App\Application;
use App\CorpTask;
use App\Http\Controllers\Controller;
use App\HubSpaceTenant;
use App\User;
use Illuminate\Http\Request;

class HubSpaceTenantsController extends Controller
{
    public function index(Request $request)
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            [null, 'Арендаторы Hub Space']
        ];

        $bindings = ['message' => $request['success_message']];

        $component = 'hub-space-tenants';

        $PAGE_TITLE = 'Арендаторы Hub Space';

        $activePage = 'hub-space-tenants';

        return view('control-panel.component',
            compact(
                'PAGE_TITLE',
                'activePage',
                'breadcrumb',
                'component',
                'bindings')
        );
    }

    public function getList(Request $request)
    {
        $tenants = HubSpaceTenant::all();

        return ['tenants' => $tenants];
    }

    public function create(Request $request)
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            ['/control-panel/hub-space-tenants', 'Арендаторы Hub Space'],
            [null, 'Добавление арендатора']
        ];

        $bindings = [];

        if ($request->application_id) {
            $app = Application::with([
                'forms',
                'forms.form',
                'forms.fields',
                'forms.fields.formField',
            ])->findOrFail($request->application_id);

            $bindings['app'] = $app;
        }

        return view('control-panel.component', [
            'PAGE_TITLE' => 'Добавление арендатора',
            'activePage' => 'hub-space-tenants',
            'breadcrumb' => $breadcrumb,
            'bindings' => $bindings,
            'component' => 'hub-space-tenants-create',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'companyName' => 'nullable|string',
            'userId' => 'required|numeric|exists:users,id',
            'phone' => 'required|string',
            'numberOfSeats' => 'required|numeric',
            'startDateTime' => 'required|date',
            'endDateTime' => 'required|date'
        ]);

        $user = User::findOrFail($request['userId']);

        $user->tenants()->create([
            'company_name' => $request['companyName'],
            'phone' => $request['phone'],
            'number_of_seats' => $request['numberOfSeats'],
            'start_datetime' => $request['startDateTime'],
            'end_datetime' => $request['endDateTime'],
        ]);

        return ['message' => 'Арендатор успешно добавлен'];
    }

    public function getUsersList(Request $request)
    {
        $users = User::all();

        return ['users' => $users];
    }

}
