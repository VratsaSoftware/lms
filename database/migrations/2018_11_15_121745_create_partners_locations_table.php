<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnersLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parnter_id')->unsigned()->nullable();
            $table->string('location');
            $table->enum('lcation_types', ['local','regional','national','international','other',])->default('local');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('parnter_id')->references('id')->on('partners')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partners_locations');
    }
}
