<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AoCettController extends Controller
{
    public function about()
    {
        $component = 'ao-cett-about';
        
        $bindings = [];
        
        return view('main.ao-cett', [
            'component' => $component,
            'bindings' => $bindings,
            'activePage' => 'about',
        ]);
    }
    
    public function grants()
    {
        $component = 'ao-cett-grants';
        
        $bindings = [];
        
        return view('main.ao-cett', [
            'component' => $component,
            'bindings' => $bindings,
            'activePage' => 'grants',
        ]);
    }
}
