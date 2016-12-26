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
    public function updateCategory($CatID) {
//        dd($CatID);
        $cat = new Category();
        $page = new UpdateCache();
        $art = new Article();
        // 根据文章 ID ，查出文章所有栏目 ID
        $CatArr = $cat -> selectArtCat($CatID);
//    dd($CatArr);
        //  遍历查询出所有栏目的子栏目
        if (!empty($CatArr)) {
            foreach ($CatArr as $value) {
                $arr = $cat -> simpleFind($value);
                $arrInfo = array();
                if (!empty($arr)) {
                    foreach ($arr as $val) {
                        $arrInfo[] = $val['id'];
                    }
                }
                $arrInfo[] = $value;
//            $CatInfo[] = $value;
                $artNum = $art -> selectCatArtCount($arrInfo);
                $pageNum = ceil($artNum / 10);
                for ($i = 0; $i < $pageNum; $i++) {
                    $list = $art -> selectCatArticle($i, $arrInfo);
//                    echo "<pre>";
//                    print_r($list);
//                    echo $value.'--'.($i+1);
//                    echo "</pre>";
                    Cache::store('file')->forever('category_'.$value.'_'.($i+1),$list);
                    Cache::store('file')->forever('page_'.$value.'_'.($i+1) , $page -> artPage($i+1,$pageNum,'/'));
                }
            }
        }
//        dd();
    }
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
