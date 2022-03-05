<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('product_types')) {
            Schema::create('product_types', function (Blueprint $table) {
                $table->increments('id');

                $table->string('name')->unique();
                //Product global types ֊ Jewelery, tableware, box, watch {1,2,3,4}
                $table->tinyInteger('product_global_type')->default(1);
                $table->tinyInteger('product_permission')->default(7);
                $table->string('product_global_name');

                $table->timestamps();
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
        //Schema::dropIfExists('product_types');
    }
}
