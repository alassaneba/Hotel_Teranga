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
            $table->date('Date_debut');
            $table->date('Date_fin');
            $table->string('Duree');
            $table->integer('Nombre_participant');
            $table->string('Restauration');
            $table->string('Equipement')->nullable('true');
            $table->longText('Autres_informations')->nullable('true');
            $table->string('Civilite');
            $table->string('Prenom');
            $table->string('Nom');
            $table->string('Identifiant')->nullable('true');
            $table->string('Societe')->nullable('true');
            $table->string('Secteur_activite')->nullable('true');
            $table->string('Email');
            $table->integer('Telephone');
            $table->integer('Montant_payer')->nullable('true');
            $table->string('Statut')->nullable('true');
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('type_event_id');
            $table->unsignedBigInteger('disposal_room_id');
            $table->unsignedBigInteger('user_id')->nullable('true');
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
