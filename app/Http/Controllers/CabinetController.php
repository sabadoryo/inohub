<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class CabinetController extends Controller
{
    public function profile()
    {
        $component = 'cabinet-profile';
        $activeTab = 'profile';

        return view('cabinet-component', [
            'component' => $component,
            'activeTab' => $activeTab,
        ]);
    }

    public function project()
    {
        $component = 'cabinet-project';
        $activeTab = 'projects';

        return view('cabinet-component', [
            'component' => $component,
            'activeTab' => $activeTab,
        ]);
    }
    
    public function updateRoles(Request $request)
    {
        $startup = Role::findByName('startup');
        $investor = Role::findByName('investor');

        if ($request->startup) {
            \Auth::user()->assignRole($startup);
        } else {
            \Auth::user()->removeRole($startup);
        }

        if ($request->investor) {
            \Auth::user()->assignRole($investor);
        } else {
            \Auth::user()->removeRole($investor);
        }
    }

}
