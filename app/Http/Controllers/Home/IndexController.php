<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\Link;
use Illuminate\Support\Facades\Cache;
use Request;


class IndexController extends Controller
{
    public function index() {
//        $link = new Link();
//		dd($link -> selectLink());
//        dd(Cache::get('link'));
		$num = Request::input('page' , 1);
		$article = Cache::tags(['index' , $num])->get('ArtList');
		
		return view('home.index')
			->with('page' , Cache::tags(['index' , $num])->get('ArtLink'))
			->with('menu' , Cache::get('topMenu'))
            ->with('link' , Cache::get('link'))
			->with('art' , $article);
	}
}
