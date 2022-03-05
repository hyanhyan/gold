<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable('');
            $table->text('description')->nullable('');
            $table->json('pictures');
            $table->json('messengers')->default('');
            $table->string('phone')->nullable('');
            $table->string('optional_phone')->nullable('');
            $table->string('address')->nullable('');
            $table->string('optional_address')->nullable('');
            $table->string('email')->nullable('');
            $table->string('market')->nullable('');

            $table->Integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_infos');
    }
}
