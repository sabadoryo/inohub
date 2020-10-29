<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function create()
    {
        return view('control-panel.component', [
            'component' => 'post-create',
            'activePage' => 'post',
            'breadcrumb' => [
            ],
            'bindings' => [
            ]
        ]);
    }
    
    public function store(Request $request)
    {
        $request->validate(['title' => 'required|min:3|max:255']);
    
        $path = null;
        if ($request->image !== "null") {
            $path = \Storage::disk('public')->put('posts_images', $request->image);
        }
        
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content_t,
            'image_path' => $path,
        ]);
    }
}
