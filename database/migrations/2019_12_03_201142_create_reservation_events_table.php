<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Nom_evenement');
            $table->string('Type_evenement');
            $table->date('Date_debut');
            $table->date('Date_fin');
            $table->string('Duree');
            $table->string('Salles');
            $table->string('Disposition');
            $table->integer('Nombre_participant');
            $table->string('Restauration');
            $table->string('Equipement')->nullable('true');
            $table->longText('Autres_informations')->nullable('true');
            $table->string('Civilite');
            $table->string('Prenom');
            $table->string('Nom');
            $table->string('Societe')->nullable('true');
            $table->string('Secteur_activite')->nullable('true');
            $table->string('Email');
            $table->integer('Telephone');
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
        Schema::dropIfExists('reservation_events');
    }
}
