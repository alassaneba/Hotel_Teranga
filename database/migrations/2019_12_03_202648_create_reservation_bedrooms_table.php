<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationBedroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_bedrooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('Date_arriver');
            $table->Time('Heure_arriver');
            $table->date('Date_depart');
            $table->integer('Nombre_chambre');
            $table->integer('Nombre_adulte');
            $table->integer('Nombre_enfant');
            $table->string('Type_chambre');
            $table->string('Civilite');
            $table->string('Prenom');
            $table->string('Nom');
            $table->string('Nationalite');
            $table->string('Email');
            $table->integer('Telephone');
            $table->integer('Montant_payer');
            $table->unsignedBigInteger('User_id')->nullable('true');
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
        Schema::dropIfExists('reservation_bedrooms');
    }
}
