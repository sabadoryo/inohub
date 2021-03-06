<?php

namespace App\Http\Controllers;

use App\Application;
use App\Notifications\MessageSendend;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class CabinetController extends Controller
{
    public function profile()
    {
        $component = 'cabinet-profile';

        return view('cabinet-component', [
            'component' => $component,
            'activeTab' => 'profile',
        ]);
    }

    public function applications()
    {
        return view('cabinet-component', [
            'component' => 'cabinet-applications',
            'activeTab' => 'applications',
        ]);
    }

    public function getApplications(Request $request)
    {

        $applications = \Auth::user()->applications()->with('entity');

        if ($request->status) {
            $applications->where('status', $request->status);
        }

        $result = $applications->paginate(5);
        return $result;
    }

    public function application($id)
    {
        //profile-page-3, profile-page-4, profile-page-7

        $app = Application::with([
            'forms',
            'forms.form',
            'forms.fields',
            'forms.fields.formField',
            'entity',

        ])->findOrFail($id);

        $app->actions = $app->actions()->with('user')->orderBy('created_at', 'asc')->get()->groupBy('type');

        foreach ($app->forms as $form) {
            foreach ($form->fields as $field) {
                $field->formField->options = json_decode($field->formField->options, true);

                if ($field->formField->type === 'file') {
                    $values = [];
                    if ($field->formField->example_files_path) {
                        $exampleFiles = [];
                        foreach ($field->formField->example_files_path as $ind => $path) {
                            array_push($exampleFiles,
                                ['name' => $field->formField->example_files_name[$ind], 'path' => $path]);
                        }
                        $field->formField->example_files = $exampleFiles;
                    }

                    foreach ($field->value as $ind => $value) {
                        array_push($values, ['path' => $value, 'name' => $field['file_name'][$ind]]);
                    }
                    $field->value = json_encode($values);
                }
                if ($field->formField->type === 'checkbox') {
                    if (count($field->value) > 0) {
                        $field->stringValue = implode(',', $field->value);
                    }
                }
            }
        }

        return view('cabinet-component', [
            'component' => 'cabinet-application-status',
            'bindings' => [
                'app' => $app,
            ],
            'activeTab' => ''
        ]);
    }

    public function notifications()
    {

        return view('cabinet-component', [
            'component' => 'cabinet-applications',
            'activeTab' => 'notifications',
        ]);
    }

    public function updateForm(Request $request, $id)
    {
//        dd($request->all());
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
                        $newFile_names = [];
                        $oldFile_pathes = [];
                        $oldFile_names = [];
                        if ($inputField['value'] != 'null') {
                            foreach ($inputField['value'] as $value) {
                                if (!is_array($value)) {
                                    $path = \Storage::disk('public')->put('application_files', $value);
                                    array_push($newFile_pathes, $path);
                                    array_push($newFile_names, $value->getClientOriginalName());
                                } else {
                                    array_push($oldFile_pathes, $value['path']);
                                    array_push($oldFile_names, $value['name']);
                                }
                            }
                        }
                        if (count($newFile_pathes)) {
                            if (count($oldFile_pathes)) {
                                $changes[] = [
                                    'label' => $field->formField->label,
                                    'old_value' => $field->value,
                                    'old_value_names' => $field->file_name,
                                    'new_value' => array_merge($newFile_pathes, $oldFile_pathes),
                                    'new_value_names' => array_merge($newFile_names, $oldFile_names),
                                    'type' => $field->formField->type,
                                ];
                            } else {
                                $changes[] = [
                                    'label' => $field->formField->label,
                                    'old_value' => $field->value,
                                    'old_value_names' => $field->file_name,
                                    'new_value' => $newFile_pathes,
                                    'new_value_names' => $newFile_names,
                                    'type' => $field->formField->type,
                                ];
                            }
                            if (count($oldFile_pathes)) {
                                $field->value = json_encode(array_merge($newFile_pathes, $oldFile_pathes));
                                $field->file_name = json_encode(array_merge($newFile_names, $oldFile_names));
                                $field->save();
                            } else {
                                $field->value = json_encode($newFile_pathes);
                                $field->file_name = json_encode($newFile_names);
                                $field->save();
                            }
                        }
                    } else {
                        $changes[] = [
                            'label' => $field->formField->label,
                            'old_value' => $field->value,
                            'new_value' => $inputField['value'],
                            'type' => $field->formField->type,
                        ];
                        $field->value = json_encode($inputField['value']);
                        $field->save();
                    }
                }
            }
        }

        $action = $app->actions()->create([
            'user_id' => \Auth::user()->id,
            'type' => 'action',
            'name' => 'application_updated',
            'additional_data' => json_encode($changes),
        ]);

        return ['changes' => $changes, 'action_id' => $action->id];
    }

    public function sendMessage(Request $request, $id)
    {

        $app = Application::with(['user', 'manager'])->find($id);

        $files = [];
        if ($request->attachedFiles) {
            foreach ($request->attachedFiles as $file) {
                $path = \Storage::disk('public')->put('application_message_attached_files', $file);
                array_push($files, ['name' => $file->getClientOriginalName(), 'path' => $path]);
            }

        }
        
        if ($request->messageFrom == 'user' && isset($app->manager)) {
            \Notification::send($app->manager, new MessageSendend(\Auth::user(), $id));
        } elseif ($request->messageFrom == 'admin') {
            \Notification::send($app->user, new MessageSendend(\Auth::user(), $id));
        }

        $app->actions()->create([
            'user_id' => \Auth::user()->id,
            'name' => $request->messageFrom === 'user' ? 'application_user_message' : 'application_admin_message',
            'message' => $request->message,
            'type' => 'message',
            'additional_data' => json_encode($files),
        ]);

        return $files;
    }

    public function downloadFile($path, $name)
    {
        return \Storage::disk('public')->download($path, $name);
    }
}
