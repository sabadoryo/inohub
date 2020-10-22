<?php

namespace App\Http\Controllers\ControlPanel;

use App\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramsController extends Controller
{
    public function index()
    {
        return view('control-panel.component', [
            'component' => 'programs-control',
            'bindings' => [],
            'PAGE_TITLE' => 'Программы'
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

        $result = $query->orderBy('id', 'desc')->paginate(6);

        return $result;
    }

    public function create()
    {
        return view('control-panel.component', [
            'component' => 'programs-create-form',
            'bindings' => [],
            'PAGE_TITLE' => 'Добавить программу'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'short_description' => 'required|string',
            'limit_date' => 'nullable|date',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'content' => 'nullable|string'
        ]);

        $data = $request->all();

        $data['user_id'] = \Auth::user()->id;
        $data['status'] = 'draft';

        $program = Program::create($data);

        return ['id' => $program->id];
    }

}
