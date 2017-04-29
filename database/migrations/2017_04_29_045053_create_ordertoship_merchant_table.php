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
            $table->double('OrderQuantity', 15, 8)->default(0.0);
            $table->double('CutQuantity', 15, 8)->default(0.0);
            $table->double('SewingReceive', 15, 8)->default(0.0);
            $table->double('FinishingReceive', 15, 8)->default(0.0);
            $table->double('PackingReceive', 15, 8)->default(0.0);

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
