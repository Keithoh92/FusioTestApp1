<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeatherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather', function (Blueprint $table) {
            $table->increments('forecast_id');
            $table->integer('id');
            $table->text('location');
            $table->text('date');
            $table->integer('min_temp');
            $table->integer('max_temp');
            $table->integer('wind_speed');
            $table->text('wind_dir');
            $table->integer('wind_speed_night');
            $table->text('wind_dir_night');
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
        Schema::dropIfExists('weather');
    }
}
