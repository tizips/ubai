<?php

namespace App\Http\Controllers\Home;

use App\Model\Article;
use Illuminate\Support\Facades\Cache;
use Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function toSearch() {
        $key = Request::get('key');
        $article = new Article();
        return view('home.search')
            ->with('menu' , Cache::get('topMenu'))
            ->with('link' , Cache::get('link'))
            ->with('art',$article->search($key)->paginate());
    }
}
