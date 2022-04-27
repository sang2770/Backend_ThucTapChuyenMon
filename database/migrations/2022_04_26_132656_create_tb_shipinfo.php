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
        Schema::create('tb_shipinfo', function (Blueprint $table) {
            $table->increments('id_ship');
            $table->string('shipname', 100);
            $table->string('phone', 10);
            $table->string('address', 100);
            $table->boolean('isdefault');
            $table->unsignedInteger('id_user');
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
        Schema::dropIfExists('tb_shipinfo');
    }
};
