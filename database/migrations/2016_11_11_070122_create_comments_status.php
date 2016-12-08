<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsStatus extends Migration
{
    /**
     * Run the migrations.
     * 会员评论状态表
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('comments_status');

        Schema::create('comments_status', function (Blueprint $table) {
            $table->tinyInteger('id');
            $table->string('comment_status_name');
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
