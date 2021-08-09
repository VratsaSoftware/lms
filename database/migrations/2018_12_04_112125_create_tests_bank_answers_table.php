<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsBankAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests_bank_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tests_bank_question_id')->unsigned()->nullable();
            $table->longText('answer');
            $table->longText('image')->nullable();
            $table->integer('correct')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('tests_bank_question_id')->references('id')->on('tests_bank_questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tests_bank_answers');
    }
}
