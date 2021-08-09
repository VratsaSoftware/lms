<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_modules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('events_id')->unsigned()->nullable();
            $table->string('name');
            $table->longText('description');
            $table->bigInteger('capacity');
            $table->enum('is_laptop', [1,0])->default(0);
            $table->enum('is_advanced', [1,0])->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('events_id')->references('id')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events_modules');
    }
}
