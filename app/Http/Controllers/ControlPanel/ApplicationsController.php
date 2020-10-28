<?php

namespace App\Http\Controllers\ControlPanel;

use App\Application;
use App\Http\Controllers\Controller;
use App\Module;
use App\Organization;
use App\Program;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    public function index()
    {
        $organizations = Organization::all();

        $breadcrumb = [
            ['/control-panel', 'Главная'],
            [null, 'Заявки']
        ];

        $bindings = [
            'organizations' => $organizations
        ];

        return view('control-panel.component', [
            'PAGE_TITLE' => 'Заявки',
            'activePage' => 'applications',
            'breadcrumb' => $breadcrumb,
            'component' => 'applications-control',
            'bindings' => $bindings
        ]);
    }

    public function getList(Request $request)
    {
        $query = Application::query();

        $result = $query->with('user', 'entity', 'manager')->paginate();

        return $result;
    }

    public function show($id)
    {
        $application = Application::with([
            'entity',
            'user',
            'manager',
            'forms',
            'forms.form',
            'forms.fields',
            'forms.fields.formField',
        ])->findOrFail($id);

        $title = 'Заявка №'.$application->id;

        $breadcrumb = [
            ['/control-panel', 'Главная'],
            ['/control-panel/applications', 'Заявки'],
            [null, $title]
        ];
        $application->actions = $application->actions()->with('user')->orderBy('created_at', 'desc')->get()->groupBy('type');

        foreach ($application->forms as $form) {
            foreach ($form->fields as $field) {
                if ($field->formField->type === 'file') {
                    if ($field->value) {
                        $files = [];
                        foreach ($field->value as $ind => $path) {
                            array_push($files, ['name' => $field->file_name[$ind], 'path' => $path]);
                        }
                        $field->value = json_encode($files);
                    }
                }
                if ($field->formField->type === 'checkbox') {
                    $field->value = join(',', $field->value);
                }
            }
        }


        $bindings = [
            'application' => $application
        ];

        return view('control-panel.component', [
            'PAGE_TITLE' => $title,
            'activePage' => 'applications',
            'breadcrumb' => $breadcrumb,
            'component' => 'application-manage',
            'bindings' => $bindings
        ]);
    }

    public function takeForProcessing($id)
    {
        $app = Application::findOrFail($id);
        $app->manager_id = \Auth::user()->id;
        $app->status = 'processing';
        $app->save();

        return [];
    }

    public function accept(Request $request, $id)
    {
        $app = Application::find($id);

        $entity = $app->entity;

        if ($entity instanceof Program) {
            $entity->members()->create([
                'user_id' => $app->user_id,
                'manager_id' => \Auth::user()->id,
                'application_id' => $app->id
            ]);
        }

        if ($entity instanceof Module) {
            if ($entity->slug == 'astanahub_membership') {

            }
        }

        $app->status = 'accepted';
        $app->save();

        return [];
    }

    public function reject(Request $request, $id)
    {
        if ($request->action == 'reject') {
            $app->status = 'rejected';
            $app->actions()->create([
                'user_id' => \Auth::user()->id,
                'name' => 'to-remake',
            ]);
        }

    }
}
