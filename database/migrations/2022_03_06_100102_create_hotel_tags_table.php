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
        Schema::create('hotel_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_room');
            $table->foreign('id_room')->references('id')->on('rooms');
            $table->unsignedBigInteger('id_tags');
            $table->foreign('id_tags')->references('id')->on('tags');
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
        Schema::dropIfExists('hotel_tags');
    }
};
