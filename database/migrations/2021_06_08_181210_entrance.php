<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Entrance extends Migration
{
    public function up()
    {
        Schema::create('entrances', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->unsignedBigInteger('idUser')->nullable();
            // $table->foreign('idUser')->references('id')->on('User');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('entrances');
    }
}
