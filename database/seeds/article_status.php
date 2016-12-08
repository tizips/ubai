<?php

use Illuminate\Database\Seeder;

class article_status extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles_status')
            ->insert([
                ['id'    =>  0, 'article_status_name'   =>  '显示'],
                ['id'    =>  1, 'article_status_name'   => '草稿']
            ]);
    }
}
