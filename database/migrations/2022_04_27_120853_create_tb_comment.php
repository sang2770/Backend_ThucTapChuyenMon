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
        Schema::create('tb_comment', function (Blueprint $table) {
            $table->increments('id_comment');
            $table->date('time');
            $table->string('content', 200);
            $table->integer('rate');
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_product');
            $table->foreign('id_product')->references('id_product')->on('tb_product');
            $table->foreign('id_user')->references('id_user')->on('tb_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_comment');
    }
};
