<?php

namespace App\Http\Controllers;

use App\CorpTask;
use App\Organization;
use App\Passport;
use App\Program;
use Illuminate\Http\Request;

class AstanaHubController extends Controller
{
    private $organization;

    public function __construct()
    {
        $this->organization = Organization::find(1);
    }

    public function about()
    {
        $component = 'astana-hub-about';

        $bindings = [];

        return view('main.astana-hub', [
            'component' => $component,
            'bindings' => $bindings,
            'activePage' => 'about',
        ]);
    }

    public function programs()
    {
        $programs = $this->organization->programs()->orderBy('title')->get();

        $bindings = [
            'programs' => $programs
        ];

        return view('main.astana-hub', [
            'component' => 'astana-hub-programs',
            'bindings' => $bindings,
            'activePage' => 'programs',
        ]);
    }

    public function program($id)
    {
        $program = Program::findOrFail($id);

        $passport = $program->passport;


        return view('gjs-layout', [
            'passport' => $passport,
            'entityType' => 'program',
            'entityId' => $id
        ]);
    }

    public function corporateInnovations()
    {
        $bindings = [];

        return view('main.astana-hub', [
            'component' => 'astana-hub-corp-innovations',
            'bindings' => $bindings,
            'activePage' => 'corp-innovations',
        ]);
    }

    public function getCorpTasksList()
    {
        $tasks = CorpTask::all();

        return ['tasks' => $tasks];
    }

    public function hubSpace()
    {
        $bindings = [];

        return view('main.astana-hub', [
            'component' => 'astana-hub-hub-space',
            'bindings' => $bindings,
            'activePage' => 'hub-space',
        ]);
    }

    public function randd()
    {
        return view('main.astana-hub', [
            'component' => 'astana-hub-randd',
            'bindings' => [],
            'activePage' => 'randd'
        ]);
    }

    public function resources()
    {
        return view('main.astana-hub', [
            'component' => 'astana-hub-resources',
            'bindings' => [],
            'activePage' => 'resources',
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
