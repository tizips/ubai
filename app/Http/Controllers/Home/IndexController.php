<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Request;


class IndexController extends Controller
{
    public function index() {
		
		$num = Request::input('page' , 1);
		$article = Cache::tags(['index' , $num])->get('ArtList');
		
		return view('home.index')
			->with('link' , Cache::tags(['index' , $num])->get('ArtLink'))
			->with('menu' , Cache::get('topMenu'))
			->with('art' , $article);
		
	}
}
