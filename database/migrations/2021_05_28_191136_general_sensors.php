<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GeneralSensors extends Migration
{
    public function up()
    {
        Schema::create('general_sensors', function (Blueprint $table) {
            $table->id();
            $table->float('temperature');
            $table->float('humidity');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('general_sensors');
    }
}
