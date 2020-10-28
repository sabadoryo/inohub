<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Passport;
use Illuminate\Http\Request;

class PassportsController extends Controller
{
    public function saveChanges($id, Request $request)
    {
        $passport = Passport::findOrFail($id);
        $request->validate([
            'gjs-html' => 'required',
            'gjs-css' => 'required'
        ]);

        $content = $request['gjs-html'] . "<style>" . $request['gjs-css'] . "</style>";
        $passport->update([
            'content' => $content
        ]);

        return [];
    }
}
