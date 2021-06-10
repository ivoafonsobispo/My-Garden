<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Plants extends Migration
{
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->enum('name', ['alfaces', 'cenouras', 'tomates']);
            $table->float('temperature');
            $table->float('luminosity');
            $table->float('humidity');
            $table->float('wind');
            $table->boolean('light');
            $table->boolean('watering');
            $table->boolean('window_state');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('plants');
    }
}
