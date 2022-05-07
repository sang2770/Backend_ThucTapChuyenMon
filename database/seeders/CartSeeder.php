<?php

namespace Database\Seeders;

use App\Models\tb_cart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tb_cart::insert([
            'id_user'    => "1",
            'id_product' => "1",
            'number'     => "2",
            'id_color'   => "1",
            'id_size'    => "1",
        ]);
        tb_cart::insert([
            'id_user'    => "1",
            'id_product' => "2",
            'number'     => "1",
            'id_color'   => "2",
            'id_size'    => "1",
        ]);
        tb_cart::insert([
            'id_user'    => "1",
            'id_product' => "3",
            'number'     => "2",
            'id_color'   => "2",
            'id_size'    => "2",
        ]);
        tb_cart::insert([
            'id_user'    => "2",
            'id_product' => "5",
            'number'     => "2",
            'id_color'   => "1",
            'id_size'    => "4",
        ]);
        tb_cart::insert([
            'id_user'    => "2",
            'id_product' => "3",
            'number'     => "1",
            'id_color'   => "2",
            'id_size'    => "3",
        ]);
    }
}
