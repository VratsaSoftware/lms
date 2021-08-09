<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_teams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('events_id')->unsigned()->nullable();
            $table->string('title');
            $table->string('picture');
            $table->string('slogan');
            $table->integer('event_team_category_id')->unsigned()->nullable();
            $table->enum('technology_stack', ['PHP','WordPress','Java','Android','Front-end','.NET','Хардуерни системи','Друго']);
            $table->string('inspiration');
            $table->string('github');
            $table->integer('is_active');
            $table->integer('members_count');
            $table->bigInteger('hack_team_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('events_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('event_team_category_id')->references('id')->on('events_team_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events_teams');
    }
}
