<?php

namespace App\Http\Controllers\ControlPanel;

use App\Application;
use App\Http\Controllers\Controller;
use App\Module;
use App\Notifications\ApplicationAccepted;
use App\Notifications\ApplicationProcessed;
use App\Notifications\ApplicationRejected;
use App\Organization;
use App\Program;
use Illuminate\Http\Request;

class ApplicationsController extends ControlPanelController
{
    public function index()
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            [null, 'Заявки']
        ];

        $managers = $this->organization->users;
        
        return view('control-panel.component', [
            'PAGE_TITLE' => 'Заявки',
            'activePage' => 'applications',
            'breadcrumb' => $breadcrumb,
            'component' => 'applications-control',
            'bindings' => [
                'managers' => $managers
            ]
        ]);
    }

    public function getList(Request $request)
    {
        $query = Application::query();
        
        if ($request->search) {
            $query->whereHas('user', function ($q) use ($request) {
               $q->search($request->search);
            });
        }
        
        if ($request->status) {
            $query->where('status', $request->status);
        }
        
        if ($request->manager_id) {
            $query->where('manager_id', $request->manager_id);
        }

        $result = $query->with('user', 'entity', 'manager')
            ->orderBy('id', 'desc')
            ->paginate(20);

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

        $title = 'Заявка №' . $application->id;

        $breadcrumb = [
            ['/control-panel', 'Главная'],
            ['/control-panel/applications', 'Заявки'],
            [null, $title]
        ];

        $application->actions = $application->actions()
            ->with('user')
            ->orderBy('created_at', 'asc')
            ->get()
            ->groupBy('type');

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
        $app = Application::with('user')->findOrFail($id);
        $app->manager_id = \Auth::user()->id;
        $app->status = 'processing';
        $app->save();
        \Notification::send($app->user, new ApplicationProcessed($app, $this->organization->name));

        return [];
    }

    public function accept(Request $request, $id)
    {
        $app = Application::with('user')->find($id);
        \Notification::send($app->user, new ApplicationAccepted($app, $this->organization->name));

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

            } elseif ($entity->slug === 'smart-store-input-solution') {

            } elseif ($entity->slug === 'smart-store-input-task') {

            }
        }

        $app->status = 'accepted';
        $app->save();

        return [];
    }

    public function reject(Request $request, $id)
    {
        $app = Application::with('user')->find($id);
        \Notification::send($app->user, new ApplicationRejected($app, $this->organization->name));
        
        if ($request->action == 'reject') {
            $app->status = 'rejected';
            $app->actions()->create([
                'user_id' => \Auth::user()->id,
                'name' => 'to-remake',
            ]);
        }

    }
}
