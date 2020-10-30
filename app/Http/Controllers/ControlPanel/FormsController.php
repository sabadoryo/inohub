<?php

namespace App\Http\Controllers\ControlPanel;

use App\Form;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;

class FormsController extends ControlPanelController
{

    public function index(Request $request)
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            [null, 'Настройка форм']
        ];

        $bindings = [];

        if ($request->success_message) {
            $bindings['message'] = $request->success_message;
        }

        return view('control-panel.component', [
            'PAGE_TITLE' => 'Настройка форм',
            'activePage' => 'forms',
            'breadcrumb' => $breadcrumb,
            'component' => 'forms-control',
            'bindings' => $bindings
        ]);
    }

    public function create()
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            ['/control-panel/forms', 'Формы'],
            [null, 'Добавить форму']
        ];

        return view('control-panel.component', [
            'PAGE_TITLE' => 'Добавить форму',
            'activePage' => 'forms',
            'breadcrumb' => $breadcrumb,
            'component' => 'form-create-form',
            'bindings' => []
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'fields' => 'required|array',
            'fields.*.type' => 'required',
            'fields.*.label' => 'required',
            'fields.*.isRequired' => 'required',
        ]);

        $form = $this->organization->forms()->create([
            'title' => $request->title,
        ]);

        foreach ($request->fields as $field) {
            if ($field['type'] === 'radio' || $field['type'] === 'select' || $field['type'] === 'checkbox') {
                $form->fields()->create([
                    'type' => $field['type'],
                    'label' => $field['label'],
                    'is_required' => $field['isRequired'] === 'true' ? true : false,
                    'options' => $field['options'] !== 'null' ? json_encode($field['options']) : null,
                    'prompt' => $field['prompt'] !== 'null' ? $field['prompt'] : null,
                    'other_option' => $field['otherOption'] === 'true' ? true : false,
                ]);
            } else {
                if ($field['type'] === 'file') {
                    $exampleFilesPath = [];
                    $exampleFilesName = [];
                    if (isset($field['exampleFiles'])) {
                        foreach ($field['exampleFiles'] as $exampleFile) {
                            $path = \Storage::disk('public')->put('application_example_files', $exampleFile);
                            array_push($exampleFilesPath, $path);
                            array_push($exampleFilesName, $exampleFile->getClientOriginalName());
                        }
                    }
                    $form->fields()->create([
                        'type' => $field['type'],
                        'label' => $field['label'],
                        'is_required' => $field['isRequired'] === 'true' ? true : false,
                        'options' => $field['options'] !== 'null' ? join(',', $field['options']) : null,
                        'prompt' => $field['prompt'] !== 'null' ? $field['prompt'] : null,
                        'max_files_count' => $field['maxFilesCount'] != 'null' ? $field['maxFilesCount'] : null,
                        'file_allows' => $field['fileAllows'],
                        'file_types' => isset($field['fileTypes']) ? json_encode($field['fileTypes']) : null,
                        'example_files_path' => json_encode($exampleFilesPath),
                        'example_files_name' => json_encode($exampleFilesName),
                    ]);
                } else {
                    $form->fields()->create([
                        'type' => $field['type'],
                        'label' => $field['label'],
                        'is_required' => $field['isRequired'] === 'true' ? true : false,
                        'options' => $field['options'] !== 'null' ? join(',', $field['options']) : null,
                        'prompt' => $field['prompt'] !== 'null' ? $field['prompt'] : null,
                        'other_option' => $field['otherOption'] === 'true' ? true : false,
                    ]);
                }
            }
        }
        return [];
    }

    public function getList(Request $request)
    {
        $query = Form::query();

        if ($request->title) {
            $query->where('title', 'like', $request->title . '%');
        }

        $result = $query
            ->orderBy('id', 'desc')
            ->paginate(20);

        return $result;
    }

    public function getAll()
    {
        return Form::orderBy('title')->get();
    }

}
