<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homeworks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lection_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('file')->nullable();
            $table->integer('evaluated_count')->default(0);
            $table->integer('evaluation_user')->default(0);
            $table->timestamps();

            $table->foreign('lection_id')->references('id')->on('course_lections')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homeworks');
    }
}
