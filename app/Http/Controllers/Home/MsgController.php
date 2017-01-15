<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Support\Facades\Cache;
use Request;

class MsgController extends Controller
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
        $commentNum = 0;
//            dd($catInfo->id);
        $commentResult = $comment -> selectCategoryChildComment($catInfo->id);

        return view('home.msg')
            ->with('menu' , Cache::get('topMenu'))
            ->with('cat',$catInfo)
            ->with('commentNum',$commentNum)
            ->with('comment',$commentResult)
            ->with('link' , Cache::get('link'));
    }
}
