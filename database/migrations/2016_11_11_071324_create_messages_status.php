<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesStatus extends Migration
{
    /**
     * Run the migrations.
     * 会员留言状态表
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('messages_status');

        Schema::create('messages_status', function (Blueprint $table) {
            $table->tinyInteger('id');
            $table->string('message_status_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
