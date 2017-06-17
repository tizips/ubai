<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     * 友情链接表
     *
     * @return void
     */
    public function up()
    {

        Schema::create('links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('web_name' , 20)->unique()->comment('站点名称');
            $table->string('web_url' , 40)->unique()->comment('友链链接');
            $table->string('web_admin' , 20)->comment('站点管理员');
            $table->string('web_email' , 60)->unique()->comment('管理员邮箱');
            $table->string('web_logo' , 255)->default('')->nullable()->comment('站点 logo');
            $table->string('web_description' , 500)->default('')->nullable()->comment('站点简介');
            $table->integer('operate_user')->comment('操作人员');
            $table->tinyInteger('web_order')->default(50)->nullable()->unsigned()->comment('站点排序');
            $table->tinyInteger('show_bottom')->default(0)->nullable()->unsigned()->comment('站点状态');
            $table->tinyInteger('web_status')->default(0)->nullable()->unsigned()->comment('站点状态');
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
        Schema::dropIfExists('links');
    }
}
