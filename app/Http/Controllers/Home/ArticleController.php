<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Request;

class ArticleController extends Controller
{
    public function index($ArtId) {
//        $article = new Article();
//        dd($article->findArtInfo(2));
//        dd(Cache::store('file')->get('article_'.$ArtId));
        return view('home.article')
            ->with('menu' , Cache::get('topMenu'))
            ->with('art' , Cache::store('file')->get('article_'.$ArtId))
            ->with('link' , Cache::get('link'));
    }
}
