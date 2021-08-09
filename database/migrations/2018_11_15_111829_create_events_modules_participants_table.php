<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsModulesParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_modules_participants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('events_modules_id')->unsigned()->nullable();
            $table->integer('cl_users_shirts_size_id')->unsigned()->nullable();
            $table->string('experience')->nullable();
            $table->string('experience_description')->nullable();
            $table->string('expectations')->nullable();
            $table->string('usability')->nullable();
            $table->string('past_participation')->nullable();
            $table->string('subscribe')->nullable();
            $table->enum('is_present', [1,0])->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('events_modules_id')->references('id')->on('events_modules')->onDelete('cascade');
            $table->foreign('cl_users_shirts_size_id')->references('id')->on('cl_users_shirts_size')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events_modules_participants');
    }
}
