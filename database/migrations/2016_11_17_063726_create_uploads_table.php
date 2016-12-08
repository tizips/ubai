<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::dropIfExists('uploads');

        Schema::create('uploads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_name' , 60)->comment('文件名称');
            $table->string('file_title' , 120)->default("")->comment('文件展示标题');
            $table->string('file_type' , 20)->comment('文件类型');
            $table->string('file_url' , 120)->comment('文件地址');
            $table->unsignedInteger('file_size')->comment('文件尺寸大小');
            $table->unsignedSmallInteger('image_width')->default(0)->comment('上传文件为图片下，图片宽度');
            $table->unsignedSmallInteger('image_height')->default(0)->comment('上传文件为图片下，图片高度');
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
