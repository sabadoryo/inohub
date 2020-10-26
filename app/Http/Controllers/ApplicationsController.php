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
                $appForm->fields()->create([
                    'form_field_id' => $field['id'],
                    'value' => $field['value'],
                ]);
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
