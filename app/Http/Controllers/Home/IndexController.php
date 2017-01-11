<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Request;


class IndexController extends Controller
{
    public function index() {
        $art = new Article();
//        dd($art->selectUserArticleID(Auth::id()));
//        dd(Cache::get('topMenu'));
//		$num = Request::input('page' , 1);
//		$article = Cache::tags(['index' , $num])->get('ArtList');
		$article = $art->selectArt();
//		dd($article);
		
		return view('home.index')
//			->with('page' , Cache::tags(['index' , $num])->get('ArtLink'))
			->with('menu' , Cache::get('topMenu'))
            ->with('link' , Cache::get('link'))
			->with('art' , $article);
	}
}
