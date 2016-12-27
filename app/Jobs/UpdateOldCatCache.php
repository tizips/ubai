<?php

namespace App\Jobs;

use App\Model\Article;
use App\Model\Category;
use App\Tool\UpdateCache;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Cache;

class UpdateOldCatCache implements ShouldQueue
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
        // 根据文章 ID ，查出文章所有栏目 ID
        $CatArr = $cat -> selectArtCat($this->CatID);
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
                    Cache::tags(['category',$value])->flush();
                }else{
                    $pageNum = ceil($artNum / 10);
//            dd($CatInfo);
                    for ($i = 0; $i < $pageNum; $i++) {
                        $list = $art -> selectCatArticle($i, $arrInfo);
                        Cache::tags(['category',$value])->forever('category_'.($i+1),$list);
                        Cache::tags(['category',$value])->forever('page_'.($i+1) , $page -> artPage($i+1,$pageNum,'/'));
                    }
                }
            }
        }
    }
}
