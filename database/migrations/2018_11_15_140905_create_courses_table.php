<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->dateTime('starts');
            $table->dateTime('ends');
            $table->string('visibility');
            $table->integer('form_active')->nullable();
            $table->date('applications_from')->nullable();
            $table->date('applications_to')->nullable();
            $table->integer('training_type')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('training_type')->references('id')->on('trainings_type')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
