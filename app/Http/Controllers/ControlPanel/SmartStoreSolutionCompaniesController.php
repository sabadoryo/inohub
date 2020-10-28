<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\SMSolutionCompany;
use Illuminate\Http\Request;

class SmartStoreSolutionCompaniesController extends Controller
{
    public function index()
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            [null, 'Мероприятия']
        ];

        $component = 'smart-store-solution-companies';

        $bindings = [];

        $PAGE_TITLE = 'Smart Store Solutions';

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
            ['/sm-solutions', 'IT-решения'],
            [null, 'Добавление ИТ компании']
        ];


        return view('control-panel.component', [
            'PAGE_TITLE' => 'Добавление ИТ компании',
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

        $path = \Storage::disk('public')->put('sm-companies/images', $request->image);
        dd($path);

//        SMSolutionCompany::create([
//            'name' => $request['name'],
//            'description' => $request['description'],
//            'site' => $request['link'],
//            'solutions' => $request['solutions'],
//            'name' => $request['name'],
//            'name' => $request['name'],
//        ]);
    }

}
