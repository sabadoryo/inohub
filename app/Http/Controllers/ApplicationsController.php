<?php

namespace App\Http\Controllers;

use App\Application;
use App\Program;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'entity_type' => 'required',
            'entity_id' => 'required',
            'forms' => 'required|array',
            'forms.*.id' => 'required',
            'forms.*.fields' => 'required|array',
            'forms.*.fields.*.id' => 'required',
            'forms.*.fields.*.value' => 'nullable',
        ]);

        $entityModel = null;

        if ($request->entity_type == 'program') {
            $entityModel = Program::class;
        }

        $app = Application::create([
            'user_id' => \Auth::user()->id,
            'entity_model' => $entityModel,
            'entity_id' => $request->entity_id,
        ]);

        foreach ($request->forms as $form) {
            $appForm = $app->forms()->create(['form_id' => $form['id']]);
            foreach ($form['fields'] as $field) {

                if ($field['type'] === 'file') {
                    $file_pathes = [];
                    if (is_array($field['value'])) {
                        foreach ($field['value'] as $file) {
                            $path = \Storage::disk('public')->put('application_files', $file);
                            array_push($file_pathes, $path);
                        }
                    } else {
                        $path = \Storage::disk('public')->put('application_files', $field['value']);
                        array_push($file_pathes, $path);
                    }
                    $appForm->fields()->create([
                        'form_field_id' => $field['id'],
                        'value' => json_encode($file_pathes),
                    ]);
                } else {
                    $appForm->fields()->create([
                        'form_field_id' => $field['id'],
                        'value' => is_array($field['value']) ? json_encode($field['value']) : $field['value'],
                    ]);
                }
            }
        }

        $app->actions()->create([
            'user_id' => \Auth::user()->id,
            'name' => 'sent'
        ]);

        return [];
    }

    public function sendMessage(Request $request, $id)
    {
        $app = Application::find($id);

        $message = $app->messages()->create([
            'user_id' => \Auth::user()->id,
            'message' => $request->message
        ]);

        return ['id' => $message->id];
    }
}
