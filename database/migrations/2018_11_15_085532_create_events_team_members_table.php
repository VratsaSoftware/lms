<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTeamMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_team_members', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('email')->nullable();
            $table->integer('cl_users_team_role_id')->unsigned()->nullable();
            $table->integer('cl_users_shirts_size_id')->unsigned()->nullable();
            $table->integer('event_team_id')->unsigned()->nullable();
            $table->integer('confirmed');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cl_users_team_role_id')->references('id')->on('cl_users_teams_roles')->onDelete('cascade');
            $table->foreign('cl_users_shirts_size_id')->references('id')->on('cl_users_shirts_size')->onDelete('cascade');
            $table->foreign('event_team_id')->references('id')->on('events_teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events_team_members');
    }
}
