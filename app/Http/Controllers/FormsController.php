<?php

namespace App\Http\Controllers;

use App\Module;
use App\Program;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function getList(Request $request)
    {
        if ($request->type == 'member') {
            $module = Module::findBySlug('astanahub_membershp');
            $forms = $module->forms()->orderBy('order_number')->with('fields')->get();
        }

        if ($request->type == 'program') {
            $programId = $request->program_id;
            $program = Program::findOrFail($programId);
            $forms = $program->forms()->orderBy('order_number')->with('fields')->get();
        }

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
