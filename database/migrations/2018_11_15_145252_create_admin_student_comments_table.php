<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminStudentCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_student_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('from')->unsigned()->nullable();
            $table->integer('to')->unsigned()->nullable();
            $table->longText('comment');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('from')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('to')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_student_comments');
    }
}
