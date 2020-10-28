<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index()
    {
        $news = News::select('id', 'title', 'published_at')
            ->where('status', 'published')
            ->latest('published_at')
            ->limit(5)
            ->get();

        $newsTotal = News::count();

        return view('main.component', [
            'component' => 'main-page',
            'bindings' => [
                'news' => $news,
                'news-count' => $newsTotal
            ]
        ]);
    }

    public function getNewsList(Request $request)
    {
        $page = $request->page;

        $news = News::select('id', 'title', 'published_at')
            ->where('status', 'published')
            ->latest('published_at')
            ->skip(($page - 1) * 5)
            ->limit(5)
            ->get();

        return $news;
    }

    public function newsPage($id)
    {
        $news = News::find($id);
        $news->data;
        return view('main.news-page', compact('news'));
    }
}
