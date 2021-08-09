<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('last_name')->nullable();
            $table->string('location')->nullable();
            $table->string('dob')->nullable();
            $table->string('sex')->nullable();
            $table->string('picture')->nullable();
            $table->string('password');
            $table->longText('bio')->nullable();
            $table->integer('cl_occupation_id')->unsigned()->nullable();
            $table->integer('cl_role_id')->unsigned()->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('cl_role_id')->references('id')->on('cl_roles');
            $table->foreign('cl_occupation_id')->references('id')->on('cl_occupations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
