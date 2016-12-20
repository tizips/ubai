<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Cache;

class DelArtCache implements ShouldQueue
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
        Cache::tags(['article' , $this->ArtID])->forget('article');
    }
}
