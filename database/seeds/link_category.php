<?php

use Illuminate\Database\Seeder;

class link_category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')
            ->insert([
                'cat_name'      =>      '友链',
                'cat_order'     =>      99,
                'cat_pid'       =>      0,
                'cat_url'       =>      'link',
                'cat_status'    =>      1,
                'cat_page'      =>      1
            ]);
    }
}
