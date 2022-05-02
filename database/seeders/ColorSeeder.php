<?php

namespace Database\Seeders;

use App\Models\tb_color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        tb_color::insert([
            'name_color'=>'Đỏ'
        ]);
        tb_color::insert([
            'name_color'=>'Vàng'
        ]);
        tb_color::insert([
            'name_color'=>'Xanh'
        ]);
        tb_color::insert([
            'name_color'=>'Tím'
        ]);
    }
}
