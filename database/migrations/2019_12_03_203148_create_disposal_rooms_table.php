<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisposalRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposal_rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('En_U');
            $table->string('Reunion');
            $table->string('Theatre');
            $table->string('Classe');
            $table->string('Cocktail');
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
        Schema::dropIfExists('disposal_rooms');
    }
}
