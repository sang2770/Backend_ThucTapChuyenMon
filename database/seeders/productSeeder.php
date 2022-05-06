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
        tb_product::insert([
            'rate' => "4",
            'availability' => "Còn hàng",
            'descriptions' => "60% cotton 40% polyester",
            'name' => "Áo phông nữ",
            'price' => "299000",
            'discount' => "5",
            'image' => "t1.jpg",
            'id_category' => "1",
        ]);
        tb_product::insert([
            'rate' => "4",
            'availability' => "Còn hàng",
            'descriptions' => "Áo kiểu nữ sát nách, chất liệu 100% cotton thoáng mát",
            'name' => "Áo kiểu nữ",
            'price' => "249000",
            'discount' => "0",
            'image' => "t2.jpg",
            'id_category' => "1",
        ]);
        tb_product::insert([
            'rate' => "5",
            'availability' => "Còn hàng",
            'descriptions' => "Áo phông nữ bo cổ, chất liệu 100% cotton in hình họa tiết",
            'name' => "Áo phông nữ",
            'price' => "249000",
            'discount' => "0",
            'image' => "t3.jpg",
            'id_category' => "1",
        ]);
        tb_product::insert([
            'rate' => "5",
            'availability' => "Còn hàng",
            'descriptions' => "Áo phông nữ in hình. Áo cổ tròn, tay cộc.",
            'name' => "Áo phông nữ",
            'price' => "249000",
            'discount' => "0",
            'image' => "t4.jpg",
            'id_category' => "1",
        ]);
        tb_product::insert([
            'rate' => "5",
            'availability' => "Còn hàng",
            'descriptions' => "Áo phông dòng active cổ tròn, chất liệu polyester có co giãn. Phù hợp đi tập luyện thể thao.",
            'name' => "Áo phông nữ",
            'price' => "269000",
            'discount' => "0",
            'image' => "t5.jpg",
            'id_category' => "1",
        ]);
        tb_product::insert([
            'rate' => "5",
            'availability' => "Còn hàng",
            'descriptions' => "Quần jeans nữ chất liệu 100% cotton USA thoải mái, phom slouchy",
            'name' => "Quần jeans nữ",
            'price' => "569000",
            'discount' => "10",
            'image' => "t6.jpg",
            'id_category' => "1",
        ]);
        tb_product::insert([
            'rate' => "5",
            'availability' => "Còn hàng",
            'descriptions' => "Quần jeans nữ dáng basic có túi",
            'name' => "Quần jeans nữ",
            'price' => "599000",
            'discount' => "10",
            'image' => "t7.jpg",
            'id_category' => "1",
        ]);
        tb_product::insert([
            'rate' => "4",
            'availability' => "Còn hàng",
            'descriptions' => "Quần jeans nữ",
            'name' => "Quần jeans nữ",
            'price' => "599000",
            'discount' => "0",
            'image' => "t8.jpg",
            'id_category' => "1",
        ]);
        tb_product::insert([
            'rate' => "5",
            'availability' => "Còn hàng",
            'descriptions' => "Quần jogger jeans chất liệu cotton USA, có co giãn. Cạp chun có luồn dây dệt, gấu chun, dáng regular",
            'name' => "Quần jeans nam",
            'price' => "599000",
            'discount' => "0",
            'image' => "t9.jpg",
            'id_category' => "2",
        ]);
        tb_product::insert([
            'rate' => "5",
            'availability' => "Còn hàng",
            'descriptions' => "Quần jeans chất liệu cotton có co giãn.
            Dáng ôm, cạp thường.
            Cài cúc, khoá kim loại.",
            'name' => "Quần jeans nam",
            'price' => "599000",
            'discount' => "0",
            'image' => "t10.jpg",
            'id_category' => "2",
        ]);
        tb_product::insert([
            'rate' => "5",
            'availability' => "Còn hàng",
            'descriptions' => "Áo polo nam basic. Cổ bằng bo dệt, cộc tay.",
            'name' => "Áo polo nam",
            'price' => "499000",
            'discount' => "5",
            'image' => "t11.jpg",
            'id_category' => "2",
        ]);
        tb_product::insert([
            'rate' => "4",
            'availability' => "Còn hàng",
            'descriptions' => "Áo polo nam basic.",
            'name' => "Áo polo nam",
            'price' => "299000",
            'discount' => "5",
            'image' => "t12.jpg",
            'id_category' => "2",
        ]);
        tb_product::insert([
            'rate' => "5",
            'availability' => "Còn hàng",
            'descriptions' => "Áo phông 100% cotton in hình",
            'name' => "Áo phông nam",
            'price' => "299000",
            'discount' => "5",
            'image' => "t13.jpg",
            'id_category' => "2",
        ]);
        tb_product::insert([
            'rate' => "5",
            'availability' => "Còn hàng",
            'descriptions' => "Áo phông nam form relax, in hổ bouncy trong phim hoạt hình gấu Pooh",
            'name' => "Áo phông nam",
            'price' => "399000",
            'discount' => "0",
            'image' => "t14.jpg",
            'id_category' => "2",
        ]);
        tb_product::insert([
            'rate' => "4",
            'availability' => "Còn hàng",
            'descriptions' => "Áo phông 100% cotton in chữ nhỏ. Có gắn mác trang trí gấu áo",
            'name' => "Áo phông nam",
            'price' => "349000",
            'discount' => "0",
            'image' => "t15.jpg",
            'id_category' => "2",
        ]);
    }
}
