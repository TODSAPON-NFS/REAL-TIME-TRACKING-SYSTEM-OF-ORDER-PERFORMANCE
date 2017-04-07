<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdertocutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordertocuts', function (Blueprint $table) {

            $table->string('Buyer',100)->nullable(false);
            $table->integer('OrderNo')->nullable(false);
            $table->integer('Color')->nullable(false);
            $table->integer('Item')->nullable(false);
            $table->double('ExtraFabric', 15, 8)->default(0.0);
            $table->double('ExcessMonitoring', 15, 8)->default(0.0);
            $table->unsignedInteger('Merchant');
            $table->unsignedInteger('Cad');
            $table->unsignedInteger('Mu');
            $table->unsignedInteger('Store');

            $table->timestamps(); 

            $table->foreign('Merchant')->references('id')->on('ordertocut_marchants');
            $table->foreign('Cad')->references('id')->on('ordertocut_cads');
            $table->foreign('Mu')->references('id')->on('ordertocut_mus');
            $table->foreign('Store')->references('id')->on('ordertocut_stores');

            $table->primary(['Buyer', 'OrderNo', 'Color', 'Item']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordertocuts');
    }
}
