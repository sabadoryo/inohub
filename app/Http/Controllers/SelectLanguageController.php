<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SelectLanguageController extends Controller
{
    public function selectLanguage($lang)
    {

        session(['locale' => $lang]);

        return redirect()->back();
    }
}
