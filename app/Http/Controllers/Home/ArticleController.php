<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\Article;
use Illuminate\Support\Facades\Cache;
use Request;

class ArticleController extends Controller
{
    public function index($ArtId) {
        $article = new Article();
//        dd($article->findArtInfo(2));
//        dd(Cache::store('file')->get('article_'.$ArtId));
//        dd();
        return view('home.article')
            ->with('menu' , Cache::get('topMenu'))
            ->with('art' , $article->findArtInfo($ArtId))
            ->with('link' , Cache::get('link'));
    }
}
