<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Option;
use Illuminate\Http\Request;

class BannersController extends Controller
{
    public function index()
    {
        $breadcrumb = [
            ['/admin', 'Главная'],
            [null, 'Баннеры']
        ];

        $bindings = [
        ];

        return view('admin.component', [
            'PAGE_TITLE' => 'Баннеры',
            'activePage' => 'banners',
            'breadcrumb' => $breadcrumb,
            'component' => 'banners-control',
            'bindings' => $bindings
        ]);
    }

    public function getBanner()
    {
        $banner = Option::where('key', 'banner1')->first();

        return $banner;
    }

    public function save(Request $request)
    {
        if (isset($request->banner)) {
            $path = \Storage::disk('public')->put('banners', $request->banner);
            Option::editOrCreate($request->key, $path);

            return \Storage::disk('public')->url($path);
        }
    }
}
