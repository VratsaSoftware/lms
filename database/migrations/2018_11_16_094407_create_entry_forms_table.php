<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntryFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entry_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id')->unsigned()->nullable();
            $table->longText('course')->nullable();
            $table->longText('module')->nullable();
            $table->longText('suitable_candidate')->nullabe();
            $table->longText('suitable_training')->nullabe();
            $table->longText('accompliments')->nullabe();
            $table->longText('expecatitions')->nullabe();
            $table->longText('use')->nullabe();
            $table->longText('source')->nullabe();
            $table->longText('cv')->nullabe();
            $table->enum('is_remote', [1,0])->default(0);
            $table->bigInteger('phone')->nullabe();
            $table->longText('source_url')->nullabe();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entry_forms');
    }
}
