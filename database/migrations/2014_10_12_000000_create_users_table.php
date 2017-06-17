<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name' , 20)->unique()->comment('用户名');
            $table->char('pen_name' , 20)->unique()->default('')->comment('笔名');
            $table->string('thumb' , 60)->default('')->comment('缩略头像');
            $table->string('email' , 40)->unique()->default('')->comment('联系邮箱');
            $table->string('github' , 255)->default('');
            $table->string('password' , 255);
            $table->string('content' , 500)->default('')->comment('个人简介');
            $table->rememberToken()->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
