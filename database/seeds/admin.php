<?php

use Illuminate\Database\Seeder;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')
            ->insert([
                'name'  =>  'tizips',
                'email' =>  'tizips@foxmail.com',
                'password'  =>  '$2y$10$lW7a70o71vZ4kD0zWUfL0uRodtHg2YfNDsO26ImjFTP.6GwN18j3S',
                'created_at'    =>  '2016-12-08 16:19:02',
                'updated_at'    =>  '2016-12-08 16:19:34'
            ]);
    }
}
