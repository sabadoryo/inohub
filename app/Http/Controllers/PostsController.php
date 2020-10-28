<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function create()
    {
        return view('control-panel.component', [
            'component' => 'post-create',
            'activePage' => 'post',
            'breadcrumb' => [
            ],
            'bindings' => [
            ]
        ]);
    }
    
    public function store(Request $request)
    {
        dd($request->all());
    }
}
