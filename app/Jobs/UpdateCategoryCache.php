<?php

namespace App\Jobs;

use App\Model\Category;
use App\Tool\UpdateCache;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Cache;
use App\Model\Article;

class UpdateCategoryCache implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    private $CatID;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($CatID)
    {
        $this->CatID = $CatID;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $cat = new Category();
        $page = new UpdateCache();
        $art = new Article();
        // 根据文章 ID ，查出修改文章后需要更新的所有栏目 ID
        $CatArr = $cat -> selectArtCat($this->CatID);
        print_r($CatArr);   // 10  1
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
                if (empty($artNum)) {
                    Cache::tags(['category',$value])->forget('category_1');
                }else{
                    $pageNum = ceil($artNum / 10);
//            dd($CatInfo);
                    for ($i = 0; $i < $pageNum; $i++) {
                        $list = $art -> selectCatArticle($i, $arrInfo);
//                        echo $list.'\n';
                        Cache::tags(['category',$value])->forever('category_'.($i+1),$list);
                        Cache::tags(['category',$value])->forever('page_'.($i+1) , $page -> artPage($i+1,$pageNum,'/'));
                    }
                }
                $arrInfo = null;
                unset($arrInfo);
            }
        }
        unset($CatArr);
        // 根据查取的所有栏目 ID ，对文章所有栏目进行更新 / 分页
    }
}
