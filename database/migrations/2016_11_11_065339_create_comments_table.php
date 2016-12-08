<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     * 会员评论表
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('comments');

        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('comment_user_name')->index()->comment('评论者');
            $table->string('comment_content' , 500)->index()->comment('评论内容');
            $table->unsignedInteger('user_pid')->default(0)->comment('评论对象');
            $table->tinyInteger('comment_status')->defautl(0)->comment('评论对象');
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
