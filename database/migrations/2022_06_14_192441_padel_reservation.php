<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PadelReservation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('padel_reservations', function (Blueprint $table) {
            $table->id('idPadelReservation')->unsigned();
            $table->foreignId('user_id')->constrained('users');
            $table->dateTime('reservation_date');
            $table->string('match_level');
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
        Schema::dropIfExists('padel_reservations');

    }
}
