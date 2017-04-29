<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdertoshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordertoships', function (Blueprint $table) {

            $table->increments('id');
            $table->string('Buyer',50)->nullable(false);
            $table->string('OrderNo', 50)->nullable(false);
            $table->string('Color',50)->nullable(false);
            $table->string('Item',50)->nullable(false);
            $table->double('CutPlan', 15, 8)->default(0.0);
            $table->double('FabricAllocation', 15, 8)->default(0.0);
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
        Schema::dropIfExists('ordertoships');
    }
}
