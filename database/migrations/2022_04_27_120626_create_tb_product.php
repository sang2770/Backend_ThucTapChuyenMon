<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_product', function (Blueprint $table) {
            $table->increments('id_product');
            $table->float('rate');
            $table->string('availability', 100);
            $table->string('descriptions', 200);
            $table->string('name', 100);
            $table->float('price');
            $table->float('discount');
            $table->string('image', 20);
            $table->unsignedInteger('id_category');
            $table->foreign('id_category')->references('id_category')->on('tb_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_product');
    }
};
