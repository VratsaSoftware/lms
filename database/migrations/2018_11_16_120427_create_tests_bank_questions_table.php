<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsBankQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests_bank_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('test_bank_id')->unsigned()->nullable();
            $table->longText('question');
            $table->longText('image')->nullable();
            $table->enum('type',['open','one','many'])->default('one');
            $table->string('difficulty');
            $table->integer('bonus')->nullable();
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
        Schema::dropIfExists('tests_bank_questions');
    }
}
