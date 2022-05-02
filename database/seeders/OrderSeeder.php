<?php

namespace Database\Seeders;

use App\Models\tb_order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tb_order::insert([
            'address'   => "Cầu giấy - HN",
            'status'    => "0",
            'time'      => "2022-02-10",
            'id_ship'   => "1",
        ]);

        tb_order::insert([
            'address'   => "Thanh xuân - HN",
            'status'    => "0",
            'time'      => "2022-03-11",
            'id_ship'   => "1",
        ]);

        tb_order::insert([
            'address'   => "Cầu giấy - HN",
            'status'    => "0",
            'time'      => "2022-03-20",
            'id_ship'   => "2",
        ]);
        tb_order::insert([
            'address'   => "Cầu giấy - HN",
            'status'    => "0",
            'time'      => "2022-03-20",
            'id_ship'   => "3",
        ]);
    }
}
