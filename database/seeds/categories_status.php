<?php

use Illuminate\Database\Seeder;

class categories_status extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories_status')
            ->insert([
                ['id'    =>  0, 'cat_status_name'   =>  '显示'],
                ['id'    =>  1, 'cat_status_name'   => '隐藏']
            ]);
    }
}
