<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdertocutStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordertocut_stores', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->double('AvailableFabricYards', 15, 8)->default(0.0);
            $table->double('AvailableFabricRolls', 15, 8)->default(0.0);
            $table->double('Output', 15, 8)->default(0.0);
            $table->timestamps();
            $table->foreign('id')->references('id')->on('ordertocuts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordertocut_stores');
    }
}
