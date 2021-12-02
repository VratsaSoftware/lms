<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_modules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id')->unsigned()->nullable();
            $table->string('name');
            $table->longText('description');
            $table->dateTime('starts');
            $table->dateTime('ends');
            $table->string('visibility');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses_modules');
    }
}
