<?php

namespace App\Http\Controllers;

use App\Application;
use App\Module;
use App\Program;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'entity_type' => 'required',
            'entity_id' => 'nullable',
            'forms' => 'required|array',
            'forms.*.id' => 'required',
            'forms.*.fields' => 'required|array',
            'forms.*.fields.*.id' => 'required',
            'forms.*.fields.*.value' => 'nullable',
        ]);

        $entityModel = null;
        $entityId = null;

        if ($request->entity_type == 'astanahub_membership') {
            $entityModel = Module::class;
            $module = Module::findBySlug('astanahub_membership');
            $entityId = $module->id;
        }

        if ($request->entity_type == 'program') {
            $entityModel = Program::class;
            $entityId = $request->entity_id;
        }

        if ($request->entity_type === 'smart-store-input-solution') {
            $entityModel = Module::class;
            $module = Module::findBySlug('smart-store-input-solution');
            $entityId = $module->id;
        }

        if ($request->entity_type === 'smart-store-input-task') {
            $entityModel = Module::class;
            $module = Module::findBySlug('smart-store-input-task');
            $entityId = $module->id;
        }

        $app = Application::create([
            'user_id' => \Auth::user()->id,
            'entity_model' => $entityModel,
            'entity_id' => $entityId,
        ]);

        foreach ($request->forms as $form) {
            $appForm = $app->forms()->create(['form_id' => $form['id']]);
            foreach ($form['fields'] as $field) {

                if ($field['type'] === 'file') {
                    $file_pathes = [];
                    $file_names = [];
                    if (is_array($field['value'])) {
                        foreach ($field['value'] as $file) {
                            $path = \Storage::disk('public')->put('application_files', $file);
                            array_push($file_pathes, $path);
                            array_push($file_names, $file->getClientOriginalName());
                        }
                    } else {
                        $path = \Storage::disk('public')->put('application_files', $field['value']);
                        array_push($file_pathes, $path);
                        array_push($file_names, $field['value']->getClientOriginalName());
                    }
                    $appForm->fields()->create([
                        'form_field_id' => $field['id'],
                        'value' => json_encode($file_pathes),
                        'file_name' => json_encode($file_names),
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
            'name' => 'application_sent',
            'type' => 'action',
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
