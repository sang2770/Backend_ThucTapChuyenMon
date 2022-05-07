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
        Schema::table('tb_cart', function (Blueprint $table) {
            $table->string('color', 50);
            $table->string('size', 50);
        });
        Schema::table('tb_order_details', function (Blueprint $table) {
            $table->string('color', 50);
            $table->string('size', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_cart', function (Blueprint $table) {
            $table->dropColumn(['color', 'size']);
        });
        Schema::table('tb_order_details', function (Blueprint $table) {
            $table->dropColumn(['color', 'size']);
        });
    }
};
