<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ControlPanel\ControlPanelController;
use App\Project;
use App\Startup;
use Illuminate\Http\Request;

class RegisterProjectController extends ControlPanelController
{
    public function form()
    {
        return view('control-panel.component', [
            'component' => 'project-register-form',
            'activePage' => 'project',
            'breadcrumb' => [
            ],
            'bindings' => [
            ]
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'company_name' => 'required',
            'link' => 'required',
            'description' => 'required',
        ]);
    
        $path = null;
        if ($request->image !== "null") {
            $path = \Storage::disk('public')->put('projects_images', $request->image);
        }
        
        Project::create([
            'user_id' => \Auth::user()->id,
            'title' => $request->title,
            'company_name' => $request->company_name,
            'link' => $request->link,
            'description' => $request->description,
            'image_path' => $path,
        ]);
    }
}
