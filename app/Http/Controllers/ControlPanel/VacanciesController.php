<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Vacancy;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VacanciesController extends Controller
{
    public function index()
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            [null, 'Вакансии']
        ];
        
        $bindings = [
        ];
        
        return view('control-panel.component', [
            'PAGE_TITLE' => 'Вакансии',
            'activePage' => 'vacancies',
            'breadcrumb' => $breadcrumb,
            'component' => 'vacancies-control',
            'bindings' => $bindings
        ]);
    }
    
    public function getList(Request $request)
    {
        $query = Vacancy::query();
        
        if ($request->title) {
            $query->where(
                'title',
                'like',
                $request->title . '%'
            );
        }
        
        if ($request->status) {
            $query->where('status', $request->status);
        }
        
        $result = $query->orderBy('id', 'desc')
            ->with(['user', 'organization'])
            ->paginate(10);
        
        return $result;
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
        ]);
        
        $vacancy = Vacancy::create([
            'title' => $request->title,
            'user_id' => \Auth::user()->id,
            'organization_id' => \Auth::user()->organization_id,
        ]);
        
        return ['id' => $vacancy->id];
    }
    
    public function mainForm($id)
    {
        $vacancy = Vacancy::find($id);
        
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            ['/control-panel/vacancies', 'Вакансии'],
            [null, $vacancy->title],
        ];
        
        return view('control-panel.component', [
            'component' => 'vacancy-main-form',
            'bindings' => [
                'vacancy' => $vacancy,
            ],
            'PAGE_TITLE' => $vacancy->title,
            'activePage' => 'vacancies',
            'breadcrumb' => $breadcrumb,
        ]);
    }
    
    public function updateMain(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
        ], [
            'title.required' => 'Введите заголовок вакансий',
            'title.min' => 'Заголовок вакансий должно содержать больше :min символов',
            'title.max' => 'Заголовок вакансий должен содержать меньше :max символов',
        ]);
        
        $vacancy = Vacancy::find($id);
        
        $vacancy->update([
            'title' => $request->title,
            'content' => $request->content_t,
        ]);
    }
    
    public function publish($id, Request $request)
    {
        $vacancy = Vacancy::find($id);
    
        $vacancy->update([
            'published_at' => Carbon::now(),
            'status' => 'published',
        ]);
    }
}
