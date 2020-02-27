<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBesoinClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('besoin_clients', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('Nom_complet');
          $table->string('Numero_chambre');
          $table->text('Description_besoin');
          $table->integer('Montant_payer');
          $table->string('Agent_conserner');
          $table->string('Statut');
          $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('besoin_clients');
    }
}
