<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StartupsController extends Controller
{
    public function index()
    {
        return view('main.component', [
            'component' => 'startups',
            'activePage' => 'startups',
        ]);
    }
}
