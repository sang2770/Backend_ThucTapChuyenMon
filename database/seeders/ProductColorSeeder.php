<?php

namespace Database\Seeders;

use App\Models\tb_productcolor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        tb_productcolor::insert([
            'id_product'=>1,
            'id_color'=>1,
        ]);
        tb_productcolor::insert([
            'id_product'=>1,
            'id_color'=>2,
        ]);
        tb_productcolor::insert([
            'id_product'=>2,
            'id_color'=>2,
        ]);
        tb_productcolor::insert([
            'id_product'=>2,
            'id_color'=>3,
        ]);
        tb_productcolor::insert([
            'id_product'=>3,
            'id_color'=>1,
        ]);
        tb_productcolor::insert([
            'id_product'=>3,
            'id_color'=>4,
        ]);
        tb_productcolor::insert([
            'id_product'=>4,
            'id_color'=>2,
        ]);
        tb_productcolor::insert([
            'id_product'=>4,
            'id_color'=>4,
        ]);
    }
}
