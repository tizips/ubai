<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\Article;
use Illuminate\Support\Facades\Cache;
use Request;

class ArticleController extends Controller
{
    public function index($ArtId) {
//        $article = new Article();
//        dd($article->findArtInfo(2));
//        dd(Cache::tags(['article' , $ArtId])->get('article'));
        return view('home.article')
            ->with('menu' , Cache::get('topMenu'))
            ->with('art' , Cache::tags(['article' , $ArtId])->get('article'));
    }
}
