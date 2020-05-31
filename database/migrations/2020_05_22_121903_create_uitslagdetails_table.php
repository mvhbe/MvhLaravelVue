<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUitslagDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uitslagdetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uitslag_id');
            $table->unsignedTinyInteger('volgorde');
            $table->unsignedMediumInteger('gewicht');
            $table->string('deelnemers');
            $table->string('plaatsen');
            $table->timestamps();

            $table->foreign('uitslag_id')->references('id')->on('uitslagen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uitslagdetails');
    }
}
