<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_room');
            $table->foreign('id_room')->references('id')->on('rooms');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('phone');
            $table->date('date_start');
            $table->date('date_end');
            $table->double('price_for_reservation')->default(0);
            $table->integer('confirm_code');
            $table->timestamp('verified_at')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('reservations');
    }
};
