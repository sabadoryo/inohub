<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NewsController extends Controller
{
    public function index()
    {
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            [null, 'Новости']
        ];
        
        $bindings = [
        ];
        
        return view('control-panel.component', [
            'PAGE_TITLE' => 'Новости',
            'activePage' => 'news',
            'breadcrumb' => $breadcrumb,
            'component' => 'news-control',
            'bindings' => $bindings
        ]);
    }
    
    public function getList(Request $request)
    {
        $query = News::query();
        
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
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
//            'short_description' => 'required',
        ]);
        
        $news = News::create([
            'title' => $request->title,
            'user_id' => \Auth::user()->id,
//            'short_description' => $request->short_description,
        ]);
        
        return ['id' => $news->id];
    }
    
    public function mainForm($id)
    {
        $news = News::find($id);
        
        $news->append('data');
        
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            ['/control-panel/news', 'Новости'],
            [null, $news->title],
        ];
        
        return view('control-panel.component', [
            'component' => 'news-main-form',
            'bindings' => [
                'news' => $news,
            ],
            'PAGE_TITLE' => $news->title,
            'activePage' => 'news',
            'breadcrumb' => $breadcrumb,
        ]);
    }
    
    public function updateMain(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
//            'short_description' => 'required',
            'data' => 'array',
            'data.*.type' => [
                'required_without:data',
                Rule::in(['text', 'image'])
            ],
            'data.*.content' => 'required_if:data.*.type,text',
        ]);
        
        $news = News::find($id);
    
        $news->texts()->delete();
        $news->images()->delete();
        
        $news->update([
            'title' => $request->title,
//            'short_description' => $request->short_description,
        ]);
    
        if ($request->data) {
            foreach ($request->data as $ind => $item) {
                
                if ($item['type'] == 'text') {
                    $news->texts()->create([
                        'content' => $item['content'],
                        'order' => $ind
                    ]);
                }
            
                if ($item['type'] == 'image') {
                    if (isset($item['image_id'])) {
                        $news->images()->create([
                            'path' => $item['path'],
                            'order' => $ind
                        ]);
                    } else {
                        $path = \Storage::disk('public')->put('news', $item['image']);
                        $news->images()->create([
                            'path' => $path,
                            'order' => $ind
                        ]);
                    }
                }
            }
        }
    }
    
    public function publish($id, Request $request)
    {
        $event = News::find($id);
        
        $event->update([
            'published_at' => Carbon::now(),
            'status' => 'published',
        ]);
    }
}
