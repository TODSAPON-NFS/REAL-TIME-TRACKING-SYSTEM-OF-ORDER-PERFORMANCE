<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecheckFabricTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recheck_fabrics', function (Blueprint $table) {
            $table->unsignedInteger('id')->primary();
            $table->double('Shrinkage', 15, 8)->default(0.0);
            $table->double('ShrinkageOutput', 15, 8)->default(0.0);
            $table->double('Bowling', 15, 8)->default(0.0);
            $table->double('BowlingOutput', 15, 8)->default(0.0);
            $table->double('FabricFault', 15, 8)->default(0.0);
            $table->double('FabricFaultOutput', 15, 8)->default(0.0);
            $table->timestamps();
            $table->foreign('id')->references('id')->on('rechecks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recheck_fabrics');
    }
}
