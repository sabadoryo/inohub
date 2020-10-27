<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class CabinetController extends Controller
{
    public function profile()
    {
        $component = 'cabinet-profile';
        $activeTab = 'profile';

        return view('cabinet-component', [
            'component' => $component,
            'activeTab' => $activeTab,
        ]);
    }

    public function project()
    {
        $component = 'cabinet-project';
        $activeTab = 'projects';

        return view('cabinet-component', [
            'component' => $component,
            'activeTab' => $activeTab,
        ]);
    }

    public function updateRoles(Request $request)
    {
        $startup = Role::findByName('startup');
        $investor = Role::findByName('investor');

        if ($request->startup) {
            \Auth::user()->assignRole($startup);
        } else {
            \Auth::user()->removeRole($startup);
        }

        if ($request->investor) {
            \Auth::user()->assignRole($investor);
        } else {
            \Auth::user()->removeRole($investor);
        }
    }


    public function applications()
    {
        $app = Application::first();

        return view('cabinet-component', [
            'component' => 'cabinet-applications',
            'activeTab' => '',
        ]);
    }

    public function application($id)
    {
        $app = Application::with([
            'forms',
            'forms.form',
            'forms.fields',
            'forms.fields.formField',
            'actions' => function ($q) {
                $q->orderBy('created_at', 'desc');
            },
            'actions.user'

        ])->findOrFail($id);

        foreach ($app->forms as $form) {
            foreach ($form->fields as $field) {
                $field->formField->options = json_decode($field->formField->options, true);

                if ($field->formField->type === 'file') {
                    $values = [];
                    foreach ($field->value as $value) {
                        array_push($values, ['name' => $value]);
                    }
                    $field->value = json_encode($values);
                }
            }
        }

        return view('cabinet-component', [
            'component' => 'application-status',
            'bindings' => [
                'app' => $app,
            ],
            'activeTab' => ''
        ]);
    }

    public function getApplications()
    {
        $applications = \Auth::user()
            ->applications()
            ->with('entity')
            ->get();

        return $applications;
    }

    public function updateForm(Request $request, $id)
    {
        $app = Application::find($id);

        $appForm = $app->forms()->where('id', $request->application_form_id)->first();

        $fields = $appForm->fields()->with('formField')->get();

        $changes = [];

        foreach ($fields as $field) {
            foreach ($request->fields as $inputField) {
                if ($field->id == $inputField['id'] &&
                    $field->value != $inputField['value']) {
                    if ($inputField['type'] === 'file') {
                        $newFile_pathes = [];
                        if ($inputField['value'] != 'null') {
                            foreach ($inputField['value'] as $value) {
                                if (!is_array($value)) {
                                    $path = \Storage::disk('public')->put('application_files',$value);
                                    array_push($newFile_pathes, $path);
                                } else {
                                    array_push($newFile_pathes, $value['name']);
                                }
                            }
                        }
                        $changes[] = [
                            'label' => $field->formField->label,
                            'old_value' => $field->value,
                            'new_value' => json_encode($newFile_pathes),
                        ];
                        $field->value = json_encode($newFile_pathes);
                        $field->save();
                    } else {
                        $changes[] = [
                            'label' => $field->formField->label,
                            'old_value' => $field->value,
                            'new_value' => $inputField['value']
                        ];
                        $field->value = json_encode($inputField['value']);
                        $field->save();
                    }
                }
            }
        }

        $action = $app->actions()->create([
            'user_id' => \Auth::user()->id,
            'name' => 'update',
            'additional_data' => json_encode($changes),
        ]);

        return ['changes' => json_encode($changes), 'action_id' => $action->id];
    }

    public function sendMessage(Request $request, $id)
    {
        $app = Application::find($id);

        $app->actions()->create([
            'user_id' => \Auth::user()->id,
            'name' => 'send message',
            'message' => $request->message
        ]);

        return [];
    }
}
