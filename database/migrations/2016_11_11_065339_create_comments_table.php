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
            $table->unsignedInteger('name')->index()->comment('评论者');
            $table->string('content',500)->ablenull()->default('')->comment('评论内容');
            $table->string('comment',500)->ablenull()->default('')->comment('回复');
            $table->unsignedInteger('comment_post_id')->default(0)->comment('评论对象');
            $table->unsignedInteger('comment_cat_id')->default(0)->comment('评论栏目');
            $table->integer('comment_parent')->ablenull()->default(0)->comment('父级评论');
            $table->tinyInteger('comment_status')->defautl(0)->comment('评论状态');
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
