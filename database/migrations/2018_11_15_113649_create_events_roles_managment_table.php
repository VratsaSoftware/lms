<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsRolesManagmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_roles_managment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('picture')->nullable();
            $table->string('occupation')->nullable();
            $table->string('technologies_stack')->nullable();
            $table->string('resume')->nullable();
            $table->string('topic')->nullable();
            $table->string('contacts')->nullable();
            $table->enum('role', ['speaker','lecturer','mentor'])->default('speaker');
            $table->integer('event_id')->unsigned()->nullable();
            $table->integer('event_modules_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('event_modules_id')->references('id')->on('events_modules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events_roles_managment');
    }
}
