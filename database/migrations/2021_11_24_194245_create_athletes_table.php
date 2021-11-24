<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAthletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('athletes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->date('birth_date')->index();
            $table->string('email', 320)->unique()->index();
            $table->unsignedTinyInteger('height')->index();
            $table->string('name', 747)->index();
            $table->unsignedInteger('nif')->unique()->index();
            $table->unsignedInteger('telephone')->index();
            $table->unsignedSmallInteger('weight')->index();

            $table->timestamp('created_at')->nullable(false)->useCurrent();
            $table->timestamp('updated_at')->nullable(false)->useCurrent();
            $table->softDeletes();

            $table->foreignId('sport_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('athletes');
    }
}
