<?php

namespace App\Http\Controllers\Home;

use App\Model\Article;
use App\Model\Category;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Request;

class CategoryController extends Controller
{
    public function index($CatName) {

//        $num = Request::input('page' , 1);
//        dd(Cache::store('file')->get('category_10_1'));
        $cat = new Category();
        $art = new Article();
        $info = $cat -> simpleFind($CatID);
//        dd($info);
        $CatInfo = array();
        foreach ($info as $val) {
            $CatInfo[] = $val['id'];
        }
        $CatInfo[] = $CatID;
//        dd($CatInfo);
//        dd($art->selectCatArticle($CatInfo));

        return view('home.category')
            ->with('menu' , Cache::get('topMenu'))
            ->with('art' , $art -> selectCatArticle($CatInfo))
//            ->with('page' , Cache::tags(['category',$CatID])->get('page_'.$num))
            ->with('link' , Cache::get('link'));
    }
}
