<?php

namespace App\Http\Controllers\ControlPanel;

use App\Application;
use App\CorpTask;
use App\CorpTaskSolution;
use App\Http\Controllers\Controller;
use App\SMTaskCompany;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;

class CorporateInnovationTasksController extends Controller
{
    public function index(Request $request)
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            [null, 'Задачи']
        ];

        $bindings = ['message' => $request['success_message']];

        $component = 'corp-tasks';

        $PAGE_TITLE = 'Задачи';

        $activePage = 'corp-tasks';

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
        $tasks = CorpTask::all();

        return ['tasks' => $tasks];
    }

    public function create(Request $request)
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            ['/control-panel/corp-tasks', 'Задачи'],
            [null, 'Добавление задачи']
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
            'PAGE_TITLE' => 'Добавление задачи',
            'activePage' => 'corp-tasks',
            'breadcrumb' => $breadcrumb,
            'bindings' => $bindings,
            'component' => 'corp-tasks-create',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'companyName' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'deadline' => 'required|date',
            'image' => 'nullable|file',
            'imagePath' => 'nullable|string',
        ]);

        if ($request['image']) {
            try {
                $imagePath = \Storage::disk('public')->put('sm-companies/images', $request['image']);
            } catch (\Exception $e) {
                return response(['message' => 'Ошибка'], 400);
            }
        } elseif ($request['imagePath']) {
            $oldPath = $request['imagePath'];
            \Storage::disk('public')->copy($oldPath, 'sm-companies/images/' . substr($oldPath, 18));
            $imagePath = 'sm-companies/images/' . substr($oldPath, 18);
        } else {
            $imagePath = '';
        }

        $status = 'active';

        CorpTask::create([
            'company_name' => $request['companyName'],
            'title' => $request['title'],
            'description' => $request['description'],
            'image' => $imagePath,
            'status' => $status,
            'deadline' => $request['deadline']
        ]);

        return ['message' => 'Задача успешно добавлена'];
    }

    public function edit(Request $request, $id)
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            ['/control-panel/corp-tasks', 'Задачи'],
            [null, 'Обновление задачи']
        ];

        $task = CorpTask::findOrFail($id);

        $bindings = [
            'task' => $task
        ];

        return view('control-panel.component', [
            'PAGE_TITLE' => 'Обновление задачи ' . $task->title,
            'activePage' => 'corp-tasks',
            'breadcrumb' => $breadcrumb,
            'bindings' => $bindings,
            'component' => 'corp-tasks-edit',
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'companyName' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'deadline' => 'required|date',
            'image' => 'nullable|file',
            'imagePath' => 'nullable|string',
        ]);

        if ($request->image) {
            try {
                $imagePath = \Storage::disk('public')->put('sm-companies/images', $request->image);
            } catch (\Exception $e) {
                return response(['message' => 'Ошибка'], 400);
            }
        } else {
            $imagePath = $request->imagePath;
        }

        $task = CorpTask::findOrFail($id);

        $status = 'active';

        $task->update([
            'company_name' => $request['companyName'],
            'title' => $request['title'],
            'description' => $request['description'],
            'image' => $imagePath,
            'status' => $status,
            'deadline' => $request['deadline']
        ]);

        return ['message' => 'Задача успешно обновлена'];
    }

    public function remove($id)
    {
        $task = CorpTask::findOrFail($id);

        $task->delete();

        return [];

    }
}
