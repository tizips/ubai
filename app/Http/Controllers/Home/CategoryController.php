<?php

namespace App\Http\Controllers\Home;

use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Request;

class CategoryController extends Controller
{
    public function index($CatID) {

        $num = Request::input('page' , 1);
//        dd(Cache::store('file')->get('category_10_1'));
        return view('home.category')
            ->with('menu' , Cache::get('topMenu'))
            ->with('art' , Cache::store('file')->get('category_'.$CatID.'_'.$num))
            ->with('page' , Cache::tags(['category',$CatID,'page'.$num])->get('link'))
            ->with('link' , Cache::get('link'));
    }
}
