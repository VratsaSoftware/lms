<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLectionsStudentsCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lections_students_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_lection_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->longText('comment');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('course_lection_id')->references('id')->on('course_lections')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lections_students_comments');
    }
}
