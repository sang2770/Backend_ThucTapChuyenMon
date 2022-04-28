<?php

namespace Database\Seeders;

use App\Models\tb_shipinfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShipInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tb_shipinfo::insert([
            'id_ship'  => "1",
            'shipname'  => "Nguyễn Văn An",
            'phone'  => "0382963146",
            'address'  => "Cầu giấy - HN",
            'isdefault'  => "1",
            'id_user'  => "1",
        ]);
        tb_shipinfo::insert([
            'id_ship'  => "2",
            'shipname'  => "Phạm Quang Minh",
            'phone'  => "0382963145",
            'address'  => "Cầu giấy - HN",
            'isdefault'  => "0",
            'id_user'  => "1",
        ]);
        tb_shipinfo::insert([
            'id_ship'  => "3",
            'shipname'  => "Nguyễn Văn Bình",
            'phone'  => "0382963140",
            'address'  => "Thanh Xuân - HN",
            'isdefault'  => "1",
            'id_user'  => "2",
        ]);
        tb_shipinfo::insert([
            'id_ship'  => "4",
            'shipname'  => "Nguyễn Văn Hoàng",
            'phone'  => "0382963149",
            'address'  => "Cầu giấy - HN",
            'isdefault'  => "0",
            'id_user'  => "2",
        ]);
    }
}
