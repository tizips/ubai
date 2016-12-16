<?php

namespace App\Tool;

use App\Model\Article;
use App\Model\Category;
use Illuminate\Support\Facades\Cache;
use Session;

class UpdateCache
{
//    public function index() {
//
//        $title = '更新缓存';
//
//        $category = new Category();
//        $catInfo = $category -> simpleFind();
//
//        return view('admin.cache' , compact('title'))
//            -> with('cat' , $catInfo)
//            -> with('user' , Session::get('userInfo'));
//    }

    public function updateIndex() {

        $article = new Article();

        $artNum = $article -> findCountArticle();
        echo '文章总数: '.$artNum."<br />";
        $pageNum = ceil($artNum / 10);
        for ($i = 0 ; $i < $pageNum ; $i ++) {
//            $article -> selectArticle($i);
            $art = $article -> selectArticle($i);
            foreach ($art as $artInfo) {
                $artInfo -> summary = substr(strip_tags($artInfo -> content) , 0 , 300);
            }
            Cache::tags(['index' , $i + 1]) -> forever('ArtList' , $art);
            Cache::tags(['index' , $i + 1]) -> forever('ArtLink' , $this -> artPage($i+1,$pageNum,'/'));
            echo "缓存首页第".($i+1).'页数据完成<br />';
        }
        echo "文章分页: ".$pageNum."<br />";
        $this -> updateMenu();
        return '首页更新完成';

    }

    public function updateMenu() {

        $category = new Category();
        Cache::forever('topMenu' , $category->selectMenu());
    }

    public function updateLink() {


    }

    public function artPage($page , $pageNum ,$url) {

        if ($pageNum == 1) {
            return '';
        }else {
            for ($i = 1 ; $i < $pageNum ; $i ++) {
                if ($page == 1) {
                    return '<a href="'.$url.'?page=2"><i class="iconfont">&#xe6ba;</i></a>';
                }elseif ($page == $pageNum) {
                    return '<a href="'.$url.'?page='.($page-1).'"><i class="iconfont">&#xe79e;</i></a>';
                }else{
                    return '<a href="'.$url.'?page='.($page-1).'"><i class="iconfont">&#xe79e;</i></a><a href="'.$url.'?page='.($page+1).'"><i class="iconfont">&#xe6ba;</i></a>';
                }
            }
        }
    }
}
