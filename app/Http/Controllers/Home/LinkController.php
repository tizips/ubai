<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Comment;
use Illuminate\Support\Facades\Cache;
use Request;

class LinkController extends Controller
{
    public function index() {

        $cat = new Category();
        $catInfo = $cat->validatorCatUrlNameExists('link');
        $info = $cat -> simpleFind($catInfo->id);

        $CatInfo = array();
        foreach ($info as $val) {
            $CatInfo[] = $val['id'];
        }
        $CatInfo[] = $catInfo->id;

        $comment = new Comment();
        $commentNum = $comment->countCategoryChildComment($catInfo->id);
//            dd($catInfo->id);
        $commentResult = $comment -> selectCategoryChildComment($catInfo->id);

        return view('home.link')
            ->with('menu' , Cache::get('topMenu'))
            ->with('cat',$catInfo)
            ->with('commentNum',$commentNum)
            ->with('comment',$commentResult)
            ->with('link' , Cache::get('link'));
    }
}
