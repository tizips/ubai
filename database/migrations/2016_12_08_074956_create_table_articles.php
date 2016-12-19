<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('articles');

        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title' , 80)->unique()->comment('文章标题');
            $table->smallInteger('cat_id')->comment('文章栏目');
            $table->tinyInteger('top')->default(0)->comment('文章置顶');
            $table->string('thumb')->default('')->comment('文章缩略图');
            $table->integer('author')->comment('作者');
            $table->longText('content')->comment('文章内容');
            $table->string('seo_title')->default('')->index()->comment('SEO 标题');
            $table->string('seo_keyword')->default('')->index()->comment('SEO 关键词');
            $table->string('seo_description')->default('')->index()->comment('SEO 描述');
            $table->tinyInteger('article_status')->default(0)->comment('文章状态');
            $table->timestamp('deleted_at')->nullable();
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
