<?php

namespace App\Http\Controllers;

use App\Program;
use Illuminate\Http\Request;

class TechGardenController extends Controller
{
    public function about()
    {
        $component = 'tech-garden-about';

        $bindings = [];

        return view('main.tech-garden', [
            'component' => $component,
            'bindings' => $bindings,
            'activePage' => 'about',
        ]);
    }

    public function programs()
    {
        $bindings = [];

        return view('main.tech-garden', [
            'component' => 'tech-garden-programs',
            'bindings' => $bindings,
            'activePage' => 'programs',
        ]);
    }

    public function smartStore(Request $request)
    {
        $bindings = [];

        return view('main.tech-garden', [
            'component' => 'tech-garden-smart-store',
            'bindings' => $bindings,
            'activePage' => 'smart-store'
        ]);
    }

    public function corporateInnovations()
    {
        $bindings = [];

        return view('main.tech-garden', [
            'component' => 'tech-garden-corp-innovations',
            'bindings' => $bindings,
            'activePage' => 'corp-innovations',
        ]);
    }

    public function hubSpace()
    {
        //todo component finish
        $bindings = [];

        return view('main.tech-garden', [
            'component' => 'tech-garden-hub-space',
            'bindings' => $bindings,
            'activePage' => 'hub-space',
        ]);
    }

    public function randd()
    {
        return view('main.tech-garden', [
            'component' => 'tech-garden-randd',
            'bindings' => [],
            'activePage' => 'randd'
        ]);
    }

    public function resources()
    {
        return view('main.tech-garden', [
            'component' => 'tech-garden-resources',
            'bindings' => [],
            'activePage' => 'resources',
        ]);
    }

    public function program($id)
    {
        $program = Program::findOrFail($id);

        $component = 'tech-garden-program';

        $bindings = [
            'program' => $program,
        ];

        return view('main.tech-garden', [
            'component' => $component,
            'bindings' => $bindings,
            'activePage' => 'programs'
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
