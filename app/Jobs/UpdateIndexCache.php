<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Cache;
use App\Model\Article;
use App\Tool\UpdateCache;

class UpdateIndexCache implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $page = new UpdateCache();

        $article = new Article();

        $artNum = $article -> findCountArticle();

        $pageNum = ceil($artNum / 10);
        for ($i = 0 ; $i < $pageNum ; $i ++) {
//            $article -> selectArticle($i);
            $art = $article -> selectArticle($i);
            foreach ($art as $artInfo) {
                $artInfo -> summary = substr(strip_tags($artInfo -> content) , 0 , 300);
            }
            Cache::tags(['index' , $i + 1]) -> forever('ArtList' , $art);
            Cache::tags(['index' , $i + 1]) -> forever('ArtLink' , $page -> artPage($i+1,$pageNum,'/'));
        }

    }
}
