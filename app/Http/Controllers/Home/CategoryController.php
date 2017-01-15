<?php

namespace App\Http\Controllers\Home;

use App\Model\Article;
use App\Model\Category;
use App\Model\Comment;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Request;

class CategoryController extends Controller
{
    public function index($CatUrlName) {

//        $num = Request::input('page' , 1);
//        dd($CatUrlName);
        $cat = new Category();
        $catInfo = $cat->validatorCatUrlNameExists($CatUrlName);
        if (!$catInfo) {
            abort('404');
        }
        $art = new Article();
        $info = $cat -> simpleFind($catInfo->id);
//        dd($catInfo);
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
            $comment = new Comment();
            $commentNum = $comment->countCategoryChildComment($catInfo->id);
//            dd($catInfo->id);
            $commentResult = $comment -> selectCategoryChildComment($catInfo->id);
//            dd($commentResult);
            return view('home.category_page')
                ->with('menu' , Cache::get('topMenu'))
                ->with('cat',$catInfo)
                ->with('commentNum',$commentNum)
                ->with('comment',$commentResult)
                ->with('link' , Cache::get('link'));
        }
    }
}
