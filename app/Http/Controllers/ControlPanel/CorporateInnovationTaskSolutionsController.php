<?php

namespace App\Http\Controllers\ControlPanel;

use App\Application;
use App\CorpTask;
use App\CorpTaskSolution;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CorporateInnovationTaskSolutionsController extends Controller
{
    public function index(Request $request)
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            [null, 'Решения']
        ];

        $bindings = ['message' => $request['success_message']];

        $component = 'corp-task-solutions';

        $PAGE_TITLE = 'Решения';

        $activePage = 'corp-task-solutions';

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
        $solutions = CorpTaskSolution::with('task')->get();

        return ['solutions' => $solutions];
    }

    public function create(Request $request)
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            ['/control-panel/corp-task-solutions', 'Решения'],
            [null, 'Добавление решения']
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
            'PAGE_TITLE' => 'Добавление решения',
            'activePage' => 'corp-task-solutions',
            'breadcrumb' => $breadcrumb,
            'bindings' => $bindings,
            'component' => 'corp-task-solutions-create',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'companyName' => 'required|string',
            'companySite' => 'required|string',
            'description' => 'required|string',
            'taskId' => 'required|numeric|exists:corp_tasks,id'
        ]);

        $task = CorpTask::findOrFail($request['taskId']);


        $task->solutions()->create([
            'company_name' => $request['companyName'],
            'company_site' => $request['companySite'],
            'description' => $request['description'],
        ]);

        return ['message' => 'Решение успешно добавлено'];
    }

    public function edit(Request $request, $id)
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            ['/control-panel/corp-task-solutions', 'Решения'],
            [null, 'Обновление решения']
        ];

        $solution = CorpTaskSolution::findOrFail($id);

        $solution->task;

        $bindings = [
            'solution' => $solution
        ];

        return view('control-panel.component', [
            'PAGE_TITLE' => 'Обновление решения по задаче ' . $solution->task->title,
            'activePage' => 'corp-task-solutions',
            'breadcrumb' => $breadcrumb,
            'bindings' => $bindings,
            'component' => 'corp-task-solutions-edit',
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'companyName' => 'required|string',
            'companySite' => 'required|string',
            'description' => 'required|string',
            'taskId' => 'required|numeric|exists:corp_tasks,id'
        ]);

        $solution = CorpTaskSolution::findOrFail($id);

        $solution->update([
            'company_name' => $request['companyName'],
            'company_site' => $request['companySite'],
            'description' => $request['description'],
        ]);

        return ['message' => 'Решение успешно обновлено'];
    }

    public function remove($id)
    {
        $solution = CorpTaskSolution::findOrFail($id);

        $solution->delete();

        return [];

    }

    public function getAllSolutions(Request $request)
    {
        $solutions = CorpTaskSolution::all();

        return ['solutions' => $solutions];
    }
}
