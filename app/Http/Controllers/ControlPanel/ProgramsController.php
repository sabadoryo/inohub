<?php

namespace App\Http\Controllers\ControlPanel;

use App\Form;
use App\Passport;
use App\Program;
use App\ProgramCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramsController extends ControlPanelController
{
    public function index()
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            [null, 'Программы']
        ];

        return view('control-panel.component', [
            'component' => 'programs-control',
            'bindings' => [],
            'PAGE_TITLE' => 'Программы',
            'activePage' => 'programs',
            'breadcrumb' => $breadcrumb,
        ]);
    }

    public function getList(Request $request)
    {
        $query = $this->organization->programs();

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

        $result = $query->with('user')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return $result;
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'short_description' => 'required'
        ]);

        $program = Program::create([
            'organization_id' => $this->organization->id,
            'user_id' => \Auth::user()->id,
            'title' => $request->title,
            'short_description' => $request->short_description,
            'status' => 'draft'
        ]);

        $program->passport()->create([]);

        return ['id' => $program->id];
    }

    public function mainForm($id)
    {
        $program = Program::find($id);

        $breadcrumb = [
            ['/control-panel', 'Главная'],
            ['/control-panel/programs', 'Программы'],
            [null, \Str::limit($program->title, 50)],
        ];

        return view('control-panel.component', [
            'component' => 'program-main-form',
            'bindings' => [
                'program' => $program,
            ],
            'PAGE_TITLE' => \Str::limit($program->title, 50),
            'activePage' => 'programs',
            'breadcrumb' => $breadcrumb,
        ]);
    }

    public function updateMain(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:3|max:255'
        ], [
            'title.required' => 'Введите название программы',
            'title.min' => 'Название программы должно содержать больше :min символов',
            'title.max' => 'Название программы должен содержать меньше :max символов',
        ]);

        $program = Program::find($id);

        $program->update([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'limit_date' => $request->limit_date,
        ]);

        return [];
    }

    public function pageForm($id)
    {
        $program = Program::with('passport')->find($id);

        $breadcrumb = [
            ['/control-panel', 'Главная'],
            ['/control-panel/programs', 'Программы'],
            [null, \Str::limit($program->title, 50)],
        ];

        return view('control-panel.component', [
            'component' => 'program-page-form',
            'bindings' => ['program' => $program],
            'PAGE_TITLE' => \Str::limit($program->title, 50),
            'activePage' => 'programs',
            'breadcrumb' => $breadcrumb,
        ]);
    }

    public function updatePage(Request $request, $id)
    {
        $request->validate([
            'content' => 'required'
        ]);

        $program = Program::findOrFail($id);

        $program->passport->update([
            'content' => $request->input('content')
        ]);

        return [];
    }

    public function forms($id)
    {
        $program = Program::with(['forms'])->find($id);
    
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            ['/control-panel/programs', 'Программы'],
            [null, $program->title],
        ];
        
        return view('control-panel.component', [
            'component' => 'program-forms',
            'bindings' => [
                'program' => $program,
            ],
            'PAGE_TITLE' => $program->title,
            'activePage' => 'programs',
            'breadcrumb' => $breadcrumb,
        ]);
    }

    public function updateForms(Request $request, $id)
    {
        $program = Program::find($id);
        
        $data = [];
        
        foreach ($request->forms as $ind => $form) {
            $data[$form['id']] = [
                'order_number' => $ind,
            ];
        }
        
        $program->forms()->sync($data);

        return [];
    }

    public function publish($id)
    {
        $program = Program::find($id);

        $program->update([
            'status' => 'published',
            'published_at' => Carbon::now(),
        ]);
    }
}
