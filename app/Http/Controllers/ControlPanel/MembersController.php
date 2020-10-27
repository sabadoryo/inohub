<?php

namespace App\Http\Controllers\ControlPanel;

use App\Application;
use App\Http\Controllers\Controller;
use App\Member;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function index()
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            [null, 'Участники AstanaHub']
        ];

        return view('control-panel.component', [
            'component' => 'members-control',
            'bindings' => [],
            'PAGE_TITLE' => 'Участники AstanaHub',
            'activePage' => 'members',
            'breadcrumb' => $breadcrumb,
        ]);
    }

    public function create(Request $request)
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            ['/control-panel/members', 'Участники AstanaHub'],
            [null, 'Добавить участника']
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
            'component' => 'members-create-form',
            'bindings' => $bindings,
            'PAGE_TITLE' => 'Добавить участники AstanaHub',
            'activePage' => 'members',
            'breadcrumb' => $breadcrumb,
        ]);
    }

    public function store(Request $request)
    {
        $applicationFilePath = $request->file('application_file')
            ->store('app/members');

        $registerCertificateFilePath = $request->file('register_certificate_file')
            ->store('app/members');

        $absenceTaxFilePath = $request->file('absence_tax_file')
            ->store('app/members');

        $member = Member::create([
            'manager_id' => \Auth::user()->id,
            'company_name' => $request->company_name,
            'project_name' => $request->project_name,
            'project_description' => $request->project_description,
            'activities' => json_encode($request->activities),
            'expected_result' => $request->expected_result,
            'address' => $request->address,
            'application_file_path' => $applicationFilePath,
            'register_certificate_file_path' => $registerCertificateFilePath,
            'absence_tax_file_path' => $absenceTaxFilePath,
        ]);

        return [];
    }

    public function getList(Request $request)
    {
        $query = Member::query();

        $result = $query->with('manager')
            ->orderBy('id', 'desc')
            ->paginate(20);

        return $result;
    }
}
