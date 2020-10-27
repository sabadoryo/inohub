<?php

namespace App\Http\Controllers\ControlPanel;

use App\Form;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function index()
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            [null, 'Формы']
        ];

        $bindings = [];

        return view('control-panel.component', [
            'PAGE_TITLE' => 'Формы',
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
            'description' => 'required',
            'fields' => 'required|array',
            'fields.*.type' => 'required',
            'fields.*.label' => 'required',
            'fields.*.isRequired' => 'required|boolean',
        ]);

        $form = Form::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        foreach ($request->fields as $field) {
            if ($field['type'] === 'radio' || $field['type'] === 'select' || $field['type'] === 'checkbox') {
                $form->fields()->create([
                    'type' => $field['type'],
                    'label' => $field['label'],
                    'is_required' => $field['isRequired'],
                    'options' => json_encode($field['options']),
                    'prompt' => $field['prompt'],
                    'other_option' => $field['otherOption'],
                    'max_files_count' => $field['maxFilesCount'],
                    'file_allows' => $field['fileAllows'],
                    'file_type' => $field['fileTypes'],
                ]);
            } else {
                $form->fields()->create([
                    'type' => $field['type'],
                    'label' => $field['label'],
                    'is_required' => $field['isRequired'],
                    'options' => $field['options'] ? join(',', $field['options']) : null,
                    'prompt' => $field['prompt'],
                    'other_option' => $field['otherOption'],
                    'max_files_count' => $field['maxFilesCount'],
                    'file_allows' => $field['fileAllows'],
                    'file_types' => json_encode($field['fileTypes']),
                ]);
            }
        }
        return [];
    }


}
