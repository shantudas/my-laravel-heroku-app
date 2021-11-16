<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCoordinates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_coordinates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->String('track_id');
            $table->double('latitude');
            $table->double('longitude');
            $table->float('accuracy');
            $table->float('speed');
            $table->String('time_stamps');
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
        Schema::dropIfExists('user_coordinates');
    }
}
