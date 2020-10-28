<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\SMSolutionCompany;
use Illuminate\Http\Request;

class SmartStoreSolutionCompaniesController extends Controller
{
    public function index(Request $request)
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            [null, 'ИТ решении']
        ];

        $bindings = ['message' => $request['success_message']];

        $component = 'smart-store-solution-companies';


        $PAGE_TITLE = 'ИТ решения';

        $activePage = 'sm-solutions';

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
        $companies = SMSolutionCompany::all();

        return ['companies' => $companies];
    }

    public function create(Request $request)
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            ['/control-panel/sm/solutions', 'ИТ-решения'],
            [null, 'Добавление ИТ решении']
        ];


        return view('control-panel.component', [
            'PAGE_TITLE' => 'Добавление ИТ решении',
            'activePage' => 'sm-solutions',
            'breadcrumb' => $breadcrumb,
            'component' => 'smart-store-solution-companies-create',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'link' => 'required|string',
            'solutions' => 'required|string',
            'image' => 'required|file',
            'presentation' => 'required|file',
        ]);

        try {
            $imagePath = \Storage::disk('public')->put('sm-companies/images', $request->image);
        } catch (\Exception $e) {
            return response(['message' => 'Ошибка'], 400);
        }

        try {
            $presentationPath = \Storage::disk('public')
                ->put('sm-companies/presentations', $request->presentation);
        } catch (\Exception $e) {
            return response(['message' => 'Ошибка'], 400);
        }

        SMSolutionCompany::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'site' => $request['link'],
            'solutions' => $request['solutions'],
            'icon' => $imagePath,
            'presentation_path' => $presentationPath,
        ]);

        return ['message' => 'Решение успешно добавлено'];
    }

    public function edit(Request $request, $id)
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            ['/control-panel/sm/solutions', 'ИТ-решения'],
            [null, 'Обновление ИТ решении']
        ];

        $company = SMSolutionCompany::findOrFail($id);

        $bindings = [
            'company' => $company
        ];

        return view('control-panel.component', [
            'PAGE_TITLE' => 'Обновление решения',
            'activePage' => 'sm-solutions',
            'breadcrumb' => $breadcrumb,
            'bindings' => $bindings,
            'component' => 'smart-store-solution-companies-edit',
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'link' => 'required|string',
            'solutions' => 'required|string',
            'image' => 'nullable|file',
            'imagePath' => 'nullable|string',
            'presentation' => 'nullable|file',
            'presentationPath' => 'nullable|string',
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

        if ($request->presentation) {
            try {
                $presentationPath = \Storage::disk('public')
                    ->put('sm-companies/presentations', $request->presentation);
            } catch (\Exception $e) {
                return response(['message' => 'Ошибка'], 400);
            }
        } else {
            $presentationPath = $request->presentationPath;
        }

        $company = SMSolutionCompany::findOrFail($id);

        $company->update([
            'name' => $request['name'],
            'description' => $request['description'],
            'site' => $request['link'],
            'solutions' => $request['solutions'],
            'icon' => $imagePath,
            'presentation_path' => $presentationPath,
        ]);

        return ['message' => 'Решение успешно обновлена'];
    }

    public function remove($id)
    {
        $company = SMSolutionCompany::findOrFail($id);

        $company->delete();

        return [];

    }

}
