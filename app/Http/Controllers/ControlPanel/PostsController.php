<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            [null, 'Посты']
        ];
        
        $bindings = [
        ];
        
        return view('control-panel.component', [
            'PAGE_TITLE' => 'Посты',
            'activePage' => 'posts',
            'breadcrumb' => $breadcrumb,
            'component' => 'posts-control',
            'bindings' => $bindings
        ]);
    }
    
    public function getList(Request $request)
    {
        $query = Post::query();
        
        if ($request->title) {
            $query->where(
                'title',
                'like',
                $request->title . '%'
            );
        }
        
        if ($request->status) {
            $query->where('status', $request->status);
        }
        
        $result = $query->orderBy('id', 'desc')
            ->with('user')
            ->paginate(10);
        
        return $result;
    }
    
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);
        
        $post = Post::find($id);
        
        $post->update([
            'status' => $request->status,
            'published_at' => $request->status == 'accept' ? Carbon::now() : null,
        ]);
        
        return ['published_at' => $post->published_at];
    }
}
