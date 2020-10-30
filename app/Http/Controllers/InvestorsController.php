<?php

namespace App\Http\Controllers;

use App\Investor;
use App\Notifications\NewStartupCreated;
use App\Startup;
use App\User;
use Illuminate\Http\Request;

class InvestorsController extends Controller
{
    public function index()
    {
        return view('main.component', [
            'component' => 'investors',
            'activePage' => 'investors',
        ]);
    }

    public function store(Request $request)
    {
        $photoPath = null;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')
                ->store('logotypes', 'public');
        }

        $investor = Investor::create([
            'user_id' => \Auth::user()->id,
            'about' => $request->about,
            'interests' => $request->interest,
            'photo_path' => $photoPath,
        ]);

//        $users = User::where('type', 'admin')->get();
//
//        $notification = new NewStartupCreated(\Auth::user(), $startup);
//
//        \Notification::send($users, $notification);

        return [];
    }
}
