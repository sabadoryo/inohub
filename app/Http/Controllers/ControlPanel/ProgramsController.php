<?php

namespace App\Http\Controllers\ControlPanel;

use App\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramsController extends Controller
{
    //
    public function index()
    {
        $query = Program::query();
        return $query->with('forms')->get();
    }
}
