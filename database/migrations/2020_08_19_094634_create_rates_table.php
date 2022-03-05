<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('rates')) {
            Schema::create('rates', function (Blueprint $table) {
                $table->increments('id');
                //$table->integer("metal_type_id")->nullable();

                $table->Integer('metal_id')->unsigned();

                $table->string('purity');
                $table->float('buy');
                $table->float('sell');
                $table->timestamps();

                $table->foreign('metal_id')->references('id')->on('metals')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('rates');
    }
}
