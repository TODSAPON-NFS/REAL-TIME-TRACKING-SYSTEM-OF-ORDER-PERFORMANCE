<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdertoshipCountryNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordertoship_country_names', function (Blueprint $table) {

            $table->increments('country_name_id');
            $table->unsignedInteger('id')->nullable(false);
            $table->string('CountryName', 50)->nullable(false);
            $table->string('ShipmentDate',50)->nullable(true);
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
        Schema::dropIfExists('ordertoship_country_names');
    }
}
