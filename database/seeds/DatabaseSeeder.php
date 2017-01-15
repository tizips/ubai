<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(admin::class);
         $this->call(article_status::class);
         $this->call(categories_status::class);
         $this->call(comments_status::class);
         $this->call(links_status::class);
         $this->call(messages_status::class);
         $this->call(systems::class);
         $this->call(link_category::class);
    }
}
