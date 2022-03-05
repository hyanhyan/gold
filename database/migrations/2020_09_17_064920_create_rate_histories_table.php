<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_histories', function (Blueprint $table) {
            $table->id();

            $table->Integer('rate_id')->unsigned();
            $table->foreign('rate_id')->references('id')->on('rates')->onDelete('cascade');
            $table->float('buy');
            $table->float('sell');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rate_histories');
    }
}
