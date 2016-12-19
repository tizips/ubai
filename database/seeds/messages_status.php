<?php

use Illuminate\Database\Seeder;

class messages_status extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages_status')
            ->insert([
                ['id'    =>  0, 'message_status_name'   => '未查看'],
                ['id'    =>  1, 'message_status_name'   => '已查看'],
                ['id'    =>  2, 'message_status_name'   => '已回复']
            ]);
    }
}
