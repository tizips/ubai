<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     * 会员留言表
     *
     * @return void
     */
    public function up()
    {

        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('message_user_name')->index()->comment('留言者');
            $table->string('message_content' , 500)->index()->comment('留言内容');
            $table->unsignedInteger('user_pid')->default(0);
            $table->tinyInteger('message_status')->defautl(0);
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

        Schema::dropIfExists('messages');
    }
}
