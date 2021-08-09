<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesCriteriaSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules_criteria_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_modules_id')->unsigned()->nullable();
            $table->integer('modules_criterias_id')->unsigned()->nullable();
            $table->bigInteger('value');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('course_modules_id')->references('id')->on('courses_modules')->onDelete('cascade');
            $table->foreign('modules_criterias_id')->references('id')->on('modules_criterias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules_criteria_settings');
    }
}
