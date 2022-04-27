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
        Schema::create('tb_order_details', function (Blueprint $table) {
            $table->unsignedInteger('id_product');
            $table->unsignedInteger('id_order');
            $table->integer('number');
            $table->float('price');
            $table->foreign('id_product')->references('id_product')->on('tb_product');
            $table->foreign('id_order')->references('id_order')->on('tb_order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_order_details');
    }
};
