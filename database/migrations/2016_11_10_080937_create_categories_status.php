<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesStatus extends Migration
{
    /**
     * Run the migrations.
     * 文章栏目状态表
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('categories_status');

        Schema::create('categories_status', function (Blueprint $table) {
            $table->tinyInteger('id');
            $table->string('cat_status_name');
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
