<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $component = '';
        $activePage = '';
        $breadcrumb = [];
        return view('admin.component', compact('component', 'activePage', 'breadcrumb'));
    }
}
