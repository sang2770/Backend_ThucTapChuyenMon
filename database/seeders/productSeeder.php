<?php

namespace Database\Seeders;

use App\Models\tb_product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tb_product::insert([
            'rate' => "4",
            'availability' => "abcdefgh",
            'descriptions' => "áo thun nam siêu đẹp, mặc thoải mãi dễ chịu",
            'name' => "áo thun nam",
            'price' => "200000",
            'discount' => "10",
            'image' => "1.jpg",
            'id_category' => "1",
        ]);
        tb_product::insert([
            'rate' => "4.5",
            'availability' => "abcdefgh",
            'descriptions' => "áo phông nam siêu đẹp, mặc thoải mãi dễ chịu",
            'name' => "áo phông nam cao cấp",
            'price' => "200000",
            'discount' => "5",
            'image' => "2.jpg",
            'id_category' => "2",
        ]);
        tb_product::insert([
            'rate' => "5",
            'availability' => "abcdefgh",
            'descriptions' => "quần âu cao cấp siêu đẹp, mặc thoải mãi",
            'name' => "quần âu cao cấp",
            'price' => "250000",
            'discount' => "0",
            'image' => "3.jpg",
            'id_category' => "3",
        ]);
        tb_product::insert([
            'rate' => "5",
            'availability' => "abcdefgh",
            'descriptions' => "áo thun nữ ngắn tay phong cách trẻ trung",
            'name' => "áo thun nữ phong cách",
            'price' => "100000",
            'discount' => "0",
            'image' => "4.jpg",
            'id_category' => "1",
        ]);
        tb_product::insert([
            'rate' => "5",
            'availability' => "abcdefgh",
            'descriptions' => "áo thun nữ ngắn tay phong cách trẻ trung",
            'name' => "áo thun nữ phong cách",
            'price' => "100000",
            'discount' => "0",
            'image' => "5.jpg",
            'id_category' => "1",
        ]);
    }
}
