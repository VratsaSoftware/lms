<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalCertificateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_certificate', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('course_id')->unsigned()->nullable();
            $table->bigInteger('number')->nullable();
            $table->string('color')->nullable();
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->string('modules')->nullable();
            $table->string('username')->nullable();
            $table->string('lecturer')->nullable();
            $table->date('date')->nullable();
            $table->integer('images', 1)->default(0);
            $table->string('center_logo')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_certificate');
    }
}
