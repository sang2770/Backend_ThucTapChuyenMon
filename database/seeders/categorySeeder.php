<?php

namespace Database\Seeders;

use App\Models\tb_category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tb_category::insert([
            'id_category' => "1",
            'name_category' => "áo thun",
        ]);
        tb_category::insert([
            'id_category' => "2",
            'name_category' => "áo phông",
        ]);
        tb_category::insert([
            'id_category' => "3",
            'name_category' => "quần jean",
        ]);
    }
}
