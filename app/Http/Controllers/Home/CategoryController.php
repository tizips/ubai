<?php

namespace App\Http\Controllers\Home;

use App\Model\Article;
use App\Model\Category;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Request;

class CategoryController extends Controller
{
    public function index($CatID) {

<<<<<<< HEAD
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
=======
        $num = Request::input('page' , 1);
//        dd(Cache::tags(['category',11])->get('category_1'));
>>>>>>> 0dcd1f5a56fb1cd152a695aa048922a702eb9343
        return view('home.category')
            ->with('menu' , Cache::get('topMenu'))
            ->with('art' , $art -> selectCatArticle($CatInfo))
//            ->with('page' , Cache::tags(['category',$CatID])->get('page_'.$num))
            ->with('link' , Cache::get('link'));
    }
}
