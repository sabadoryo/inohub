<?php

namespace App\Http\Controllers;

use App\Startup;
use Illuminate\Http\Request;

class RegisterProjectController extends Controller
{
    public function form()
    {
        return view('main.component', [
            'component' => 'project-register-form',
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;

        Startup::create($data);
    }
}
