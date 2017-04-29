<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdertoshipMerchantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('ordertoship_marchants', function (Blueprint $table) {

            $table->increments('marchant_id');
            $table->unsignedInteger('id')->nullable(false);
            $table->string('Size', 50)->nullable(false);
            $table->string('OrderQuantity',50)->nullable(false);
            $table->string('CutQuantity', 50)->nullable(false);
            $table->string('SewingReceive',50)->nullable(false);
            $table->string('FinishingReceive', 50)->nullable(false);
            $table->string('PackingReceive',50)->nullable(false);

            $table->timestamps();

            $table->foreign('id')->references('id')->on('ordertoships');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordertoship_marchants');
    }
}
