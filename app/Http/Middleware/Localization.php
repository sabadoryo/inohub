<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(Session::has('locale')) {
            App::setlocale(Session::get('locale'));
        }

        $lang = App::getLocale();

        $dictionary = $this->generateDictionary($lang);
        view()->share('activeLang', $lang);
        view()->share('dictionary', $dictionary);

        return $next($request);
    }

    private function generateDictionary($lang)
    {
        $key = 'dictionary_' . $lang;

        if (config('app.env') == 'production' && Cache::has($key)) {
            return Cache::get($key);
        }

        $dictionary = [];

        $dictionaryPath = resource_path('lang/' . $lang . '.json');
        if (file_exists($dictionaryPath)) {
            $dictionary = file_get_contents($dictionaryPath, true);
            $dictionary = json_decode($dictionary, true);
        }

        Cache::rememberForever($key, function () use ($dictionary) {
            return $dictionary;
        });

        return $dictionary;


//        $files = \File::allFiles(resource_path('lang/' . $lang));
//        $files = collect($files);
//        $translations = $files->flatMap(function ($file) {
//            $fileName = $file->getBasename('.php');
//            return [$fileName => trans($fileName)];
//        });
//        $translations = [];
//        $res = compact('translations', 'dictionary');;
    }
}
