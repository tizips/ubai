<?php

namespace App\Jobs;

use App\Model\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Cache;

class UpdateArticleCache implements ShouldQueue
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
        $article = new Article();
        $art = $article -> findArtInfo($this->ArtID);
        Cache::store('file') -> forever('article_'.$this->ArtID,$art);
    }
}
