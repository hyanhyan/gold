<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRateGlobalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_globals', function (Blueprint $table) {
            $table->increments('id');
            //$table->integer("metal_type_id")->nullable();

            $table->Integer('metal_id')->unsigned();

            $table->double('price')->default(0.0);
            $table->timestamps();

            $table->foreign('metal_id')->references('id')->on('metals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rate_globals');
    }
}
