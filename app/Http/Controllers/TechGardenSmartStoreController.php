<?php

namespace App\Http\Controllers;

use App\SMSolutionCompany;
use App\SMTaskCompany;
use Illuminate\Http\Request;

class TechGardenSmartStoreController extends Controller
{
    public function getTasksList(Request $request)
    {
        $tasks = SMTaskCompany::all();

        return ['tasks' => $tasks];
    }

    public function getSolutionsList(Request $request)
    {
        $solutions = SMSolutionCompany::all();

        return ['solutions' => $solutions];
    }
}
