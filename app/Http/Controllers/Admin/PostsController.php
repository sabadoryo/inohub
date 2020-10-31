<?php

namespace App\Http\Controllers\Admin;

use App\Feed;
use App\Http\Controllers\Controller;
use App\Notifications\PostAccepted;
use App\Notifications\PostRejected;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $breadcrumb = [
            ['/admin', 'Главная'],
            [null, 'Посты']
        ];
        
        $bindings = [
        ];
        
        return view('admin.component', [
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
    
    public function postCheck($id)
    {
        $post = Post::with('user')->find($id)->append('data');
    
        $breadcrumb = [
            ['/admin', 'Главная'],
            ['/admin/posts', 'Посты'],
            [null, $post->title],
        ];
    
        return view('admin.component', [
            'component' => 'post-check-form',
            'bindings' => [
                'post' => $post,
            ],
            'PAGE_TITLE' => $post->title,
            'activePage' => 'posts',
            'breadcrumb' => $breadcrumb,
        ]);
    }
    
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);
        
        $post = Post::with('user')->find($id);
        
        if ($request->status == 'accept') {
            \Notification::send($post->user, new PostAccepted($post));
        } else {
            \Notification::send($post->user, new PostRejected($post));
        }
        
        $post->update([
            'status' => $request->status,
            'published_at' => $request->status == 'accept' ? Carbon::now() : null,
        ]);

        Feed::create([
            'entity_model' => Post::class,
            'entity_id' => $post->id
        ]);
        
        return ['published_at' => $post->published_at];
    }
}
