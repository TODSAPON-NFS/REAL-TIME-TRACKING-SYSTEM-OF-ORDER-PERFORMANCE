<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecheckTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rechecks', function (Blueprint $table) {

            $table->increments('id');
            $table->string('Buyer',50)->nullable(false);
            $table->integer('OrderNo')->nullable(false);
            $table->integer('Color')->nullable(false);
            $table->integer('Item')->nullable(false);
            $table->double('MarkerLengthInYard', 15, 8)->default(0.0);
            $table->double('FabricRequired', 15, 8)->default(0.0);
            $table->double('Totalfabric', 15, 8)->default(0.0);
            $table->double('PiecesCut', 15, 8)->default(0.0);
            $table->double('ExtraBooking', 15, 8)->default(0.0);
            $table->timestamps();

            $table->unique(['Buyer', 'OrderNo', 'Color', 'Item']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rechecks');
    }
}
