<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKarateBeltsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karate_belts', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('color', 10)->unique();

            $table->timestamp('created_at')->nullable(false)->useCurrent();
            $table->timestamp('updated_at')->nullable(false)->useCurrent();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karate_belts');
    }
}
