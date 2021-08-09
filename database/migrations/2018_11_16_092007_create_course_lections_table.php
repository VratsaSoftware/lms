<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseLectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_lections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_modules_id')->unsigned()->nullable();
            $table->bigInteger('order')->nullable();
            $table->string('title');
            $table->longText('description');
            $table->dateTime('first_date')->nullable();
            $table->dateTime('second_date')->nullable();
            $table->integer('lections_video_id')->unsigned()->nullable();
            $table->string('presentation')->nullable();
            $table->string('homework_criteria')->nullable();
            $table->string('demo')->nullable();
            $table->string('visibility');
            $table->string('type')->nullable();
            $table->date('homework_end')->nullable();
            $table->date('homework_check_end')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('course_modules_id')->references('id')->on('courses_modules')->onDelete('cascade');
            $table->foreign('lections_video_id')->references('id')->on('lections_videos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_lections');
    }
}
