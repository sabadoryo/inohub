<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Image;
use Illuminate\Http\File;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public function index()
    {
        $images = Image::all();
        $res = [];
        foreach ($images as $img) {
            $res[] = \Storage::disk('public')->url($img->path);
        }

        return ['data' => $res];
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'files' => 'required|array',
            'files.*.0' => 'required|image'
        ]);

        foreach ($request->files as $files) {
            foreach ($files as $file) {
                $res = \Storage::disk('public')->putFile('images', new File($file));
                Image::create([
                    'name' => (new File($file))->getFilename(),
                    'path' => $res
                ]);
            }
        }

        $images = Image::all();
        $res = [];
        foreach ($images as $img) {
            $res[] = \Storage::disk('public')->url($img->path);
        }

        return ['data' => $res];
    }

    public function getImage($name)
    {
        $url = \Storage::disk('public')->url($name);
        return redirect($url);
    }
}
