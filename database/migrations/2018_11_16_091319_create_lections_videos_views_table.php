<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLectionsVideosViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lections_videos_views', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lection_video_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->bigInteger('views_count');
            $table->bigInteger('runtime')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('lection_video_id')->references('id')->on('lections_videos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lections_videos_views');
    }
}
