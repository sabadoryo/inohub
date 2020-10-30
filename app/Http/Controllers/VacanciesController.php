<?php

namespace App\Http\Controllers;

use App\Vacancy;
use Illuminate\Http\Request;

class VacanciesController extends Controller
{
    public function index()
    {
        $vacancies = Vacancy::with(['organization'])->get();

        $bindings = [
            'vacancies' => $vacancies
        ];


        return view('main.component', [
            'PAGE_TITLE' => 'Вакансии',
            'activePage' => 'vacancies',
            'component' => 'vacancies-page',
            'bindings' => $bindings
        ]);
    }
}
