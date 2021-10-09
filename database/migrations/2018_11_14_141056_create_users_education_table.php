<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_education', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->bigInteger('y_from')->nullable();
            $table->bigInteger('y_to')->nullable();
            $table->integer('cl_education_type_id')->unsigned()->nullable();
            $table->integer('institution_id')->unsigned()->nullable();
            $table->integer('specialty_id')->unsigned()->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cl_education_type_id')->references('id')->on('cl_education_types')->onDelete('cascade');
            $table->foreign('institution_id')->references('id')->on('users_institutions')->onDelete('cascade');
            $table->foreign('specialty_id')->references('id')->on('users_specialties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_education');
    }
}
