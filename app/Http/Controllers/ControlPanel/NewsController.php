<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;

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
    
        if ($request->name) {
            $query->where(
                'title',
                'like',
                $request->title . '%'
            );
        }
        
        if ($request->status == 'draft') {
            $query->where('status', $request->status);
        } elseif ($request->status == 'published') {
            $query->where('status', $request->status);
        }
    
        $result = $query->orderBy('id', 'desc')
            ->paginate(10);
    
        return $result;
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'short_description' => 'required',
        ]);
        
        $news = News::create([
            'title' => $request->title,
            'short_description' => $request->short_description,
        ]);
        
        return ['id' => $news->id];
    }
    
    public function mainForm($id)
    {
        $news = News::find($id);
        
        $news->append('data');
        
        $breadcrumb = [
            ['/control-panel', 'Главная'],
            ['/control-panel/events', 'Мероприятия'],
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
}
