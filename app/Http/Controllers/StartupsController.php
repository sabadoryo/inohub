<?php

namespace App\Http\Controllers;

use App\Startup;
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

    public function store(Request $request)
    {
        $logotypePath = null;

        if ($request->hasFile('logotype')) {
            $logotypePath = $request->file('logotype')
                ->store('public/logotypes');
        }

        Startup::create([
            'user_id' => \Auth::user()->id,
            'project_name' => $request->project_name,
            'description' => $request->description,
            'link' => $request->link,
            'logo_path' => $logotypePath,
            'company_name' => $request->company_name,
            'bin' => $request->bin,
            'employees_count' => $request->employees_count,
            'foundation_year' => $request->foundation_year
        ]);

        return [];
    }
}
