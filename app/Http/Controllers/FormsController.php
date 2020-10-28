<?php

namespace App\Http\Controllers;

use App\Module;
use App\Program;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function getList(Request $request)
    {
        if ($request->type == 'astanahub_membership') {
            $module = Module::findBySlug('astanahub_membership');
            $forms = $module->forms()->orderBy('order_number')->with('fields')->get();
        }

        if ($request->type == 'program') {
            $programId = $request->program_id;
            $program = Program::findOrFail($programId);
            $forms = $program->forms()->orderBy('order_number')->with('fields')->get();
        }

        foreach ($forms as $form) {
            foreach ($form->fields as $field) {
                if ($field->type === 'radio' ||
                    $field->type === 'checkbox' ||
                    $field->type === 'select') {
                    $field->options = json_decode($field->options, true);
                }

                if ($field->type === 'file') {
                    if ($field->file_allows !== 'any') {
                        $field->file_types = implode(
                            ',',
                            json_decode($field->file_types)
                        );
                    }
                    if ($field->example_files_path) {
                        $exampleFiles = [];
                        foreach ($field->example_files_path as $ind => $path) {
                            array_push($exampleFiles, ['name' => $field->example_files_name[$ind], 'path' => $path]);
                        }
                        $field->example_files = $exampleFiles;
                    }
                }
            }
        }

        return ['forms' => $forms];
    }
}
