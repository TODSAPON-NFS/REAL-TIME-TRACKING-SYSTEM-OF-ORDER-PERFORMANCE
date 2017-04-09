<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdertocutMuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordertocut_mus', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->double('IncreasedConsumption', 15, 8)->default(0.0);
            $table->double('FabricFault', 15, 8)->default(0.0);
            $table->double('RollShortage', 15, 8)->default(0.0);
            $table->double('ProductionDamage', 15, 8)->default(0.0);
            $table->double('UnusableCutPcs', 15, 8)->default(0.0);
            $table->double('CuttingMistake', 15, 8)->default(0.0);
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
        Schema::dropIfExists('ordertocut_mus');
    }
}
