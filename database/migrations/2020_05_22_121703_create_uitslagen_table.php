<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUitslagenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uitslagen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wedstrijd_id');
            $table->unsignedInteger('totaal_gewicht');
            $table->unsignedTinyInteger('aantal_deelnemers');
            $table->unsignedInteger('gemiddeld_gewicht');
            $table->timestamps();

            $table->foreign('wedstrijd_id')->references('id')->on('wedstrijden');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uitslagen');
    }
}
