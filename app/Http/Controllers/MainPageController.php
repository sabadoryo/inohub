<?php

namespace App\Http\Controllers;

use App\Feed;
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

        $feedsCount = Feed::count();

        $feeds = Feed::with('entity')
            ->latest('created_at')
            ->limit(5)
            ->get();

        return view('main.component', [
            'component' => 'main-page',
            'bindings' => [
                'news' => $news,
                'news-count' => $newsTotal,
                'feeds-count' => $feedsCount,
                'feeds' => $feeds
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

    public function getFeedsList(Request $request)
    {
        $page = $request->page;

        $feeds = Feed::with('entity')
            ->latest('created_at')
            ->skip(($page - 1) * 5)
            ->limit(5)
            ->get();

        return $feeds;
    }
}
