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
            'id_order'  => "1",
            'address'   => "Cầu giấy - HN",
            'status'    => "0",
            'time'      => "2022-02-10",
            'id_user'   => "1",
        ]);

        tb_order::insert([
            'id_order'  => "2",
            'address'   => "Thanh xuân - HN",
            'status'    => "0",
            'time'      => "2022-03-11",
            'id_user'   => "1",
        ]);

        tb_order::insert([
            'id_order'  => "3",
            'address'   => "Cầu giấy - HN",
            'status'    => "0",
            'time'      => "2022-03-20",
            'id_user'   => "2",
        ]);

    }
}
