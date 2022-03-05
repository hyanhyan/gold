<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->increments('id');

                $table->integer('order_id')->default(0);
                $table->integer('published')->default(1);

                $table->float('price')->default(0.0);
                $table->float('weight')->default(0.0);
                $table->string('code')->nullable(false);
                $table->string('color')->default('yellow');
                $table->tinyInteger('used')->default(0);
                $table->string('videoURL')->default('');

                $table->json('pictures');

                //local or abroad {1,2}
                $table->tinyInteger('loc_glob')->default(1);

                //product owner user
                $table->Integer('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

                //Woman Man Child {1,2,3}
                $table->tinyInteger('m_w_c')->default(1);

                //metal type
                $table->Integer('metal_id')->unsigned()->default(1);
                $table->foreign('metal_id')->references('id')->on('metals')->onDelete('cascade');

                //rate ID
                $table->Integer('rate_id')->unsigned()->default(1);
                $table->foreign('rate_id')->references('id')->on('rates')->onDelete('cascade');

                $table->json('addresses');

                //product type ID(ring,chain ...)
                $table->Integer('product_type_id')->unsigned();
                $table->foreign('product_type_id')->references('id')->on('product_types')->onDelete('cascade');

                $table->integer('click_count')->default(0)->after('product_type_id');
                $table->boolean('fake')->default(0)->after('product_type_id');
                $table->timestamps();
            });

            Schema::create('favorite_user_table', function (Blueprint $table) {
                $table->integer('product_id');
                $table->integer('user_id');
                $table->index(['product_id','user_id']);
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
//        Schema::dropIfExists('products');
    }
}
