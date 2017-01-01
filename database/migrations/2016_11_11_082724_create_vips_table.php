<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVipsTable extends Migration
{
    /**
     * Run the migrations.
     * 普通会员表
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('vips');

        Schema::create('vips', function (Blueprint $table) {
            $table->increments('id');
            $table->char('user_name' , 20)->unique()->comment('会员名');
            $table->string('user_email' , 40)->unique()->default('')->comment('会员邮箱');
            $table->string('user_url' , 60)->unique()->default('')->comment('会员站点');
            $table->string('thumb' , 120)->default('')->comment('会员缩略图');
            $table->unsignedTinyInteger('user_status')->default(0)->comment('状态');
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

    }
}
