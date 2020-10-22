<?php

namespace App\Http\Controllers;

use App\Program;
use Illuminate\Http\Request;

class AstanaHubController extends Controller
{
    public function index()
    {
        $programs = Program::all();

        $component = 'astana-hub-page';

        $bindings = [
            'programs' => $programs,
        ];

        return view('main.component', [
            'component' => $component,
            'bindings' => $bindings,
        ]);
    }

    public function program($id)
    {
        $program = Program::findOrFail($id);

        $component = 'astana-hub-program';

        $bindings = [
            'program' => $program,
        ];

        return view('main.component', [
            'component' => $component,
            'bindings' => $bindings,
        ]);
    }
}
