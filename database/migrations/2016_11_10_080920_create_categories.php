<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategories extends Migration
{
    /**
     * Run the migrations.
     * 文章栏目表
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('categories');

        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cat_name' , 60)->unique()->comment('栏目名称');
            $table->tinyInteger('cat_order')->default(0)->comment('栏目排序');
            $table->string('cat_pic' , 60)->default('')->comment('栏目图片');
            $table->integer('cat_pid')->comment('父级栏目 ID');
            $table->string('cat_seo_title', 80)->default('')->index()->comment('栏目 SEO 标题');
            $table->string('cat_seo_keyword' , 150)->default('')->index()->comment('栏目 SEO 关键词');
            $table->string('cat_seo_description' , 255)->default('')->index()->comment('栏目 SEO 描述');
            $table->string('cat_url' , 120)->default('')->comment('栏目链接');
            $table->tinyInteger('cat_status')->default(0)->comment('栏目状态');
            $table->tinyInteger('cat_page')->default(0)->comment('是否单页');
            $table->string('cat_page_content' , 5000)->default('')->index()->comment('单页内容');
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
