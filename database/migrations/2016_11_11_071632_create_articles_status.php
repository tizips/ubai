<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesStatus extends Migration
{
    /**
     * Run the migrations.
     * 文章状态表
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('articles_status');

        Schema::create('articles_status', function (Blueprint $table) {
            $table->tinyInteger('id');
            $table->string('article_status_name');
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
