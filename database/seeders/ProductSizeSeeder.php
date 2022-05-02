<?php

namespace Database\Seeders;

use App\Models\tb_productsize;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        tb_productsize::insert([
            'id_product'=>1,
            'id_size'=>1,
        ]);
        tb_productsize::insert([
            'id_product'=>1,
            'id_size'=>2,
        ]);
        tb_productsize::insert([
            'id_product'=>1,
            'id_size'=>3,
        ]);

    }
}
