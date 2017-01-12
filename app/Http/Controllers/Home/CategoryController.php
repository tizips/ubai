<?php

namespace App\Http\Controllers\Home;

use App\Model\Article;
use App\Model\Category;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Request;

class CategoryController extends Controller
{
    public function index($CatUrlName) {

//        $num = Request::input('page' , 1);
//        dd(Cache::store('file')->get('category_10_1'));
//        dd($CatUrlName);
        $cat = new Category();
        $catInfo = $cat->validatorCatUrlNameExists($CatUrlName);
        if (!$catInfo) {
            abort('404');
        }
        $art = new Article();
        $info = $cat -> simpleFind($catInfo->id);
//        dd($info);
        $CatInfo = array();
        foreach ($info as $val) {
            $CatInfo[] = $val['id'];
        }
        $CatInfo[] = $catInfo->id;
//        dd($CatInfo);
//        dd($art->selectCatArticle($CatInfo));
        if (!$catInfo->cat_page) {

            return view('home.category_list')
                ->with('menu' , Cache::get('topMenu'))
                ->with('art' , $art -> selectCatArticle($CatInfo))
//            ->with('page' , Cache::tags(['category',$CatID])->get('page_'.$num))
                ->with('link' , Cache::get('link'));
        }else{
            return view('home.category_page')
                ->with('menu' , Cache::get('topMenu'))
                ->with('cat',$catInfo)
                ->with('link' , Cache::get('link'));
        }
    }
}
