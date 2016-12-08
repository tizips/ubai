<?php

use Illuminate\Database\Seeder;

class images_cat extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('images_type')
            ->insert([
                ['image_type_name'    =>  'article', 'image_type_title'   =>  '文章'],
                ['image_type_name'    =>  'category', 'image_type_title'   => '栏目'],
                ['image_type_name'    =>  'user', 'image_type_title'   => '用户'],
                ['image_type_name'    =>  'friendLink', 'image_type_title'   => '友情链接']
            ]);
    }
}
