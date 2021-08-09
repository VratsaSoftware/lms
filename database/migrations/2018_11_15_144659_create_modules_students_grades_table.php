<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesStudentsGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules_students_grades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('module_student_id')->unsigned()->nullable();
            $table->integer('modules_criteria_settings_id')->unsigned()->nullable();
            $table->bigInteger('grade');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('module_student_id')->references('id')->on('modules_students')->onDelete('cascade');
            $table->foreign('modules_criteria_settings_id')->references('id')->on('modules_criteria_settings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules_students_grades');
    }
}
