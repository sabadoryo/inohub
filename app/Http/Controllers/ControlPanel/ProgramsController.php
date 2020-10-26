<?php

namespace App\Http\Controllers\ControlPanel;

use App\Form;
use App\Program;
use App\ProgramCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramsController extends Controller
{
    public function index()
    {
        $categories = ProgramCategory::all();

        return view('control-panel.component', [
            'component' => 'programs-control',
            'bindings' => [
                'categories' => $categories,
            ],
            'PAGE_TITLE' => 'Программы',
            'activePage' => 'programs',
            'breadcrumb' => [],
        ]);
    }

    public function getList(Request $request)
    {
        $query = Program::query();

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

        $result = $query->with('category')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return $result;
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'category_id' => 'nullable|exists:program_categories,id',
        ]);

        $program = Program::create([
            'user_id' => \Auth::user()->id,
            'title' => $request->title,
            'program_category_id' => $request->category_id
        ]);

        return ['id' => $program->id];
    }

    public function mainForm($id)
    {
        $program = Program::find($id);

        $categories = ProgramCategory::all();
    
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            ['/control-panel/programs', 'Программы'],
            [null, $program->title],
        ];

        return view('control-panel.component', [
            'component' => 'program-main-form',
            'bindings' => [
                'categories' => $categories,
                'program' => $program,
            ],
            'PAGE_TITLE' => $program->title,
            'activePage' => 'programs',
            'breadcrumb' => $breadcrumb,
        ]);
    }
    
    public function pageForm($id)
    {
        $program = Program::find($id);
    
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            [null, 'Программы']
        ];
    
        return view('control-panel.component', [
            'component' => 'program-page-form',
            'bindings' => [
                'program' => $program,
            ],
            'PAGE_TITLE' => $program->title,
            'activePage' => 'programs',
            'breadcrumb' => $breadcrumb,
        ]);
    }
    
    public function forms($id)
    {
        $program = Program::with(['forms'])->find($id);
    
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            ['/control-panel/programs', 'Программы'],
            [null, $program->title],
        ];
        
        $forms = Form::all();
    
        return view('control-panel.component', [
            'component' => 'program-forms',
            'bindings' => [
                'forms' => $forms,
                'program' => $program,
            ],
            'PAGE_TITLE' => $program->title,
            'activePage' => 'programs',
            'breadcrumb' => $breadcrumb,
        ]);
    }

    public function create()
    {
        $forms = Form::all();

        return view('control-panel.component', [
            'component' => 'programs-create-form',
            'bindings' => [
                'forms' => $forms,
            ],
            'PAGE_TITLE' => 'Добавить программу',
            'activePage' => 'programs',
            'breadcrumb' => []
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
            'program_category_id' => $request->category_id,
            'color' => $request->color,
            'limit_date' => $request->limit_date,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        
        return [];
    }
    
    public function updateFormsList($id)
    {
        $forms = Form::all();
        
        return [
            'forms' => $forms,
        ];
    }
    
    public function updateForms(Request $request, $id)
    {
        $program = Program::find($id);
        
        $data = [];
        
        foreach ($request->forms as $key => $form) {
            $data[$form['id']] = [
                'order_number' => $key,
            ];
        }
        
        $program->forms()->sync($data);
        
        return [];
    }

}
