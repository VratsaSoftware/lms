<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->nullable();
            $table->string('name');
            $table->string('picture');
            $table->longText('rules');
            $table->longText('description');
            $table->dateTime('from');
            $table->dateTime('to');
            $table->string('location');
            $table->enum('is_team', [1,0])->default(0);
            $table->integer('min_team')->nullable();
            $table->integer('max_team')->nullable();
            $table->enum('is_module', [1,0])->default(0);
            $table->string('visibility');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
