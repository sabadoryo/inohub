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

    public function getProgramForms($id)
    {
        $program = Program::findOrFail($id);

        $forms = $program->forms()->orderBy('form_program.order_number')
            ->with('fields')
            ->get();

        foreach ($forms as $form) {
            foreach ($form->fields as $field) {

                if ($field->type === 'radio' || $field->type === 'checkbox' || $field->type === 'select') {
                    $field->options = json_decode($field->options, true);
                }

                if ($field->type === 'file') {
                    $field->file_types = implode(',', json_decode($field->file_types));
                }
            }
        }

        return ['forms' => $forms];
    }
}
