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

    private $ArtID;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($ArtID)
    {
        $this->ArtID = $ArtID;
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
        // 根据文章 ID ，查出文章所有栏目 ID
        $CatArr = $cat -> selectArtCat($this->ArtID);
        //  遍历查询出所有栏目的子栏目
        foreach ($CatArr as $value) {
            $info = $cat -> simpleFind($value);
            $CatInfo = array();
            foreach ($info as $val) {
                $CatInfo[] = $val['id'];
            }
            $art = new Article();
            $artNum = $art -> selectCatArtCount($CatInfo);
            $pageNum = ceil($artNum / 10);
            for ($i = 0; $i < $pageNum; $i++) {
                $list = $art -> selectCatArticle($i, $CatInfo);
                Cache::tags(['category',$value,'page'.$i])->forever('category',$list);
                Cache::tags(['category' ,$value,'page'.($i+1)]) -> forever('page' , $page -> artPage($i+1,$pageNum,'/'));
            }
        }
        // 根据查取的所有栏目 ID ，对文章所有栏目进行更新 / 分页
    }
}
