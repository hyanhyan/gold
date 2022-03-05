<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRateGlobalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_global_histories', function (Blueprint $table) {
            $table->id();

            $table->Integer('rate_id')->unsigned();
            $table->foreign('rate_id')->references('id')->on('rate_globals')->onDelete('cascade');
            $table->double('price')->default(0.0);
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
        Schema::dropIfExists('rate_global_histories');
    }
}
