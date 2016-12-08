<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksStatusTable extends Migration
{
    /**
     * Run the migrations.
     * 友情链接状态表
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('links_status');

        Schema::create('links_status', function (Blueprint $table) {
            $table->tinyInteger('id');
            $table->string('link_status_name');
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
