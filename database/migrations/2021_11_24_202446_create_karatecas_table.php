<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaratecasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karatecas', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('athlete_id')->constrained();
            $table->foreignId('karate_belt_id')->constrained();
            $table->foreignId('karate_type_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karatecas');
    }
}
