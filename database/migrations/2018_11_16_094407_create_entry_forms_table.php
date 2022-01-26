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
            $table->longText('suitable_candidate')->nullable();
            $table->longText('suitable_training')->nullable();
            $table->longText('accompliments')->nullable();
            $table->longText('expecatitions')->nullable();
            $table->longText('use')->nullable();
            $table->longText('source')->nullable();
            $table->longText('cv')->nullable();
            $table->string('github')->nullable();
            $table->enum('is_remote', [1, 0])->default(0);
            $table->string('phone', 20)->nullable();
            $table->longText('source_url')->nullable();
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
