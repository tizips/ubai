<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemsTable extends Migration
{
    /**
     * Run the migrations.
     * 系统设置表
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('systems');

        Schema::create('systems', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('set_name' , 20)->unique()->comment('变量名');
            $table->string('set_description' , 60)->default('参数说明');
            $table->string('set_value' , 1000)->comment('参数值');
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
