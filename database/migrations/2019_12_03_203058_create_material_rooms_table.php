<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Video_projecteur');
            $table->string('Internet');
            $table->string('Sonorisation');
            $table->string('Autre');
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
        Schema::dropIfExists('material_rooms');
    }
}
