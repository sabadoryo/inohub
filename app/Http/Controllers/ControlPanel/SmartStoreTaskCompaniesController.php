<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\SMTaskCompany;
use Illuminate\Http\Request;

class SmartStoreTaskCompaniesController extends Controller
{
    public function index(Request $request)
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            [null, 'Задачи']
        ];

        $bindings = ['message' => $request['success_message']];

        $component = 'smart-store-task-companies';

        $PAGE_TITLE = 'Задачи';

        $activePage = 'sm-tasks';

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
        $companies = SMTaskCompany::all();

        return ['companies' => $companies];
    }

    public function create(Request $request)
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            ['/control-panel/sm/tasks', 'Задачи'],
            [null, 'Добавление задачи']
        ];

        return view('control-panel.component', [
            'PAGE_TITLE' => 'Добавление задачи',
            'activePage' => 'sm-tasks',
            'breadcrumb' => $breadcrumb,
            'component' => 'smart-store-task-companies-create',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'link' => 'required|string',
            'manufacturedProducts' => 'nullable|string',
            'fullyBP' => 'nullable|string',
            'partlyBP' => 'nullable|string',
            'address' => 'nullable|string',
            'actualTasks' => 'nullable|string',
            'embeddedTasks' => 'nullable|string',
            'image' => 'required|file',
        ]);

        try {
            $imagePath = \Storage::disk('public')->put('sm-companies/images', $request->image);
        } catch (\Exception $e) {
            return response(['message' => 'Ошибка'], 400);
        }

        SMTaskCompany::create([
            'name' => $request['name'],
            'site' => $request['link'],
            'manufactured_products' => $request['manufacturedProducts'],
            'fully_bp' => $request['fullyBP'],
            'partly_bp' => $request['partlyBP'],
            'address' => $request['address'],
            'actual_tasks' => $request['actualTasks'],
            'embedded_tasks' => $request['embeddedTasks'],
            'icon' => $imagePath,
        ]);

        return ['message' => 'Задача успешно добавлена'];
    }

    public function edit(Request $request, $id)
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            ['/control-panel/sm/tasks', 'Задачи'],
            [null, 'Обновление задачи']
        ];

        $company = SMTaskCompany::findOrFail($id);

        $bindings = [
            'company' => $company
        ];

        return view('control-panel.component', [
            'PAGE_TITLE' => 'Обновление задачи ' . $company->name,
            'activePage' => 'sm-tasks',
            'breadcrumb' => $breadcrumb,
            'bindings' => $bindings,
            'component' => 'smart-store-task-companies-edit',
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'link' => 'required|string',
            'manufacturedProducts' => 'nullable|string',
            'fullyBP' => 'nullable|string',
            'partlyBP' => 'nullable|string',
            'address' => 'nullable|string',
            'actualTasks' => 'nullable|string',
            'embeddedTasks' => 'nullable|string',
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

        $company = SMTaskCompany::findOrFail($id);

        $company->update([
            'name' => $request['name'],
            'site' => $request['link'],
            'manufactured_products' => $request['manufacturedProducts'],
            'fully_bp' => $request['fullyBP'],
            'partly_bp' => $request['partlyBP'],
            'address' => $request['address'],
            'actual_tasks' => $request['actualTasks'],
            'embedded_tasks' => $request['embeddedTasks'],
            'icon' => $imagePath,
        ]);

        return ['message' => 'Задача успешно обновлена'];
    }

    public function remove($id)
    {
        $company = SMTaskCompany::findOrFail($id);

        $company->delete();

        return [];

    }
}
