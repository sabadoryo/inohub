<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ControlPanel\ControlPanelController;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends ControlPanelController
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
        $request->validate([
            'title' => 'required',
            'data' => 'array',
        ]);
        
        $post = Post::create([
            'user_id' => \Auth::user()->id,
            'title' => $request->title,
        ]);
        
        if ($request->data) {
            foreach ($request->data as $ind => $item) {
                if ($item['type'] == 'text') {
                    $post->texts()->create([
                        'content' => $item['content'],
                        'order' => $ind
                    ]);
                }
                
                if ($item['type'] == 'image') {
                    $path = \Storage::disk('public')->put('posts_images', $item['image']);
                    $post->images()->create([
                        'path' => $path,
                        'order' => $ind
                    ]);
                }
            }
        }
    }
}
