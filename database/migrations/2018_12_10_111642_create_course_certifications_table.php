<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseCertificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_certifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('course_id')->unsigned()->nullable();
            $table->string('course_name')->nullable();
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->dateTime('started')->nullable();
            $table->dateTime('finished')->nullable();
            $table->string('lecturers')->nullable();
            $table->bigInteger('score')->nullable();
            $table->enum('is_module',['1','0'])->default('0');
            $table->string('module_name')->nullable();
            $table->integer('module_id')->unsigned()->nullable();
            $table->longText('certification_number');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('module_id')->references('id')->on('courses_modules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_certifications');
    }
}
