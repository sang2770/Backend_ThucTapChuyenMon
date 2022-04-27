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
        Schema::create('tb_wishlist_details', function (Blueprint $table) {
            $table->unsignedInteger('id_wishlist');
            $table->unsignedInteger('id_product');
            $table->foreign('id_wishlist')->references('id_wishlist')->on('tb_wishlist');
            $table->foreign('id_product')->references('id_product')->on('tb_product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_wishlist_details');
    }
};
