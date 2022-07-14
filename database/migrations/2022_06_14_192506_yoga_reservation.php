<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class YogaReservation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yoga_reservations', function (Blueprint $table) {
            $table->id('idYogaReservation')->unsigned();
            $table->foreignId('user_id')->constrained('users');
            $table->dateTime('reservation_date');
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
        Schema::dropIfExists('yoga_reservations');
    }
}
