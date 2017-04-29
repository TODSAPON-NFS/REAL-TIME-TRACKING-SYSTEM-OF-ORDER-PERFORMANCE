<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdertoshipCountryValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordertoship_country_values', function (Blueprint $table) {

            $table->increments('country_value_id');
            $table->unsignedInteger('id')->nullable(false);
            $table->unsignedInteger('country_name_id')->nullable(false);
            $table->double('Value', 15, 8)->default(0.0);

            $table->timestamps();

            $table->foreign('id')->references('id')->on('ordertoships');
            $table->foreign('country_name_id')->references('country_name_id')->on('ordertoship_country_names');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordertoship_country_values');
    }
}
