<?php

namespace App\Http\Controllers;

use App\Feed;
use App\News;
use App\Post;
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
            ->get();

        foreach ($feeds as $feed) {
            if ($feed->entity instanceof Post) {
                $img = $feed->entity->images()->first();
                $text = $feed->entity->texts()->first();
                $feed->image_url = $img ? $img->url : null;
                $feed->text = \Str::limit(strip_tags(json_decode($text->content)), 100, '...');
                $feed->entity->user;
            }
        }

        return view('main.component', [
            'component' => 'main-page',
            'activePage' => 'main',
            'bindings' => [
                'news' => $news,
                'news-count' => $newsTotal,
                'feeds-count' => $feedsCount,
                'feeds' => $feeds,
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
