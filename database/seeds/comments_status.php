<?php

use Illuminate\Database\Seeder;

class comments_status extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments_status')
            ->insert([
                ['id'    =>  0, 'comment_status_name'   =>  '未查看'],
                ['id'    =>  1, 'comment_status_name'   => '已查看'],
                ['id'    =>  2, 'comment_status_name'   =>  '已回复']
            ]);
    }
}
