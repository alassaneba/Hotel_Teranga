<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Reunion');
            $table->string('Seminaire');
            $table->string('Soiree_ou_Diner_de_gala');
            $table->string('Cocktail');
            $table->string('Lancement_produit');
            $table->string('Formation');
            $table->unsignedBigInteger('ReservationEvent_id');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_events');
    }
}
