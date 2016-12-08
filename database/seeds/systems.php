<?php

use Illuminate\Database\Seeder;

class systems extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('systems')
            ->insert([
                ['set_name' => 'web_name' , 'set_description'   =>  '站点名称' , 'set_value' => '余白'],
                ['set_name' => 'web_url' , 'set_description'   =>  '站点根网址' , 'set_value' => 'https://www.ubai.me'],
                ['set_name' => 'web_logo' , 'set_description'   =>  '站点 logo' , 'set_value' => ''],
                ['set_name' => 'admin_email' , 'set_description'   =>  '管理云邮箱' , 'set_value' => ''],
                ['set_name' => 'upload_limit' , 'set_description'   =>  '上传限制' , 'set_value' => '2'],
                ['set_name' => 'web_tcp' , 'set_description'   =>  '站点备案号' , 'set_value' => ''],
                ['set_name' => 'web_description' , 'set_description'   =>  '站点简介' , 'set_value' => ''],
                ['set_name' => 'upload_type' , 'set_description'   =>  '上传附件类型' , 'set_value' => ''],
                ['set_name' => 'prohibit_word' , 'set_description'   =>  '禁词' , 'set_value' => ''],
                ['set_name' => 'keyword_replace' , 'set_description'   =>  '替词' , 'set_value' => ''],
                ['set_name' => 'copyright' , 'set_description'   =>  '版权' , 'set_value' => ''],
            ]);
    }
}
