<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdertocutCadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordertocut_cads', function (Blueprint $table) {
            $table->increments('id');
            $table->double('CuttingWastage', 15, 8)->default(0.0);
            $table->double('ExtraLoading', 15, 8)->default(0.0);
            $table->double('RelaxingShrinkage', 15, 8)->default(0.0);
            $table->double('WashingWastage', 15, 8)->default(0.0);
            $table->double('Output', 15, 8)->default(0.0);
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
        Schema::dropIfExists('ordertocut_cads');
    }
}
