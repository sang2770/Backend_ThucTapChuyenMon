<?php

namespace Database\Seeders;

use App\Models\tb_orderdetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tb_orderdetail::insert([
            'id_product' => "1",
            'id_order' => "1",
            'number' => "2",
            'price' => "100000",
        ]);
        tb_orderdetail::insert([
            'id_product' => "2",
            'id_order' => "1",
            'number' => "2",
            'price' => "150000",
        ]);
        tb_orderdetail::insert([
            'id_product' => "3",
            'id_order' => "2",
            'number' => "1",
            'price' => "50000",
        ]);
        tb_orderdetail::insert([
            'id_product' => "4",
            'id_order' => "3",
            'number' => "2",
            'price' => "100000",
        ]);
        tb_orderdetail::insert([
            'id_product' => "2",
            'id_order' => "3",
            'number' => "1",
            'price' => "120000",
        ]);
        
    }
}
