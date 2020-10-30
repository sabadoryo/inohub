<?php

namespace App\Http\Controllers;

use App\Notifications\NewStartupCreated;
use App\Startup;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

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
                ->store('logotypes', 'public');
        }

        $startup = Startup::create([
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

        $users = User::where('type', 'admin')->get();

        $notification = new NewStartupCreated(\Auth::user(), $startup);

        \Notification::send($users, $notification);

        return [];
    }
}
