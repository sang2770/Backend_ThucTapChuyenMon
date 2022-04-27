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
        Schema::create('tb_productsize', function (Blueprint $table) {
            $table->unsignedInteger('id_product');
            $table->unsignedInteger('id_size');
            $table->foreign('id_product')->references('id_product')->on('tb_product');
            $table->foreign('id_size')->references('id_size')->on('tb_size');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_productsize');
    }
};
