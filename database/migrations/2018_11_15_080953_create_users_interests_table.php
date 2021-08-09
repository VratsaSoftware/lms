<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cl_users_interests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cl_users_interest_type_id')->unsigned()->nullable();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('cl_users_interest_type_id')->references('id')->on('cl_users_interest_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cl_users_interests');
    }
}
