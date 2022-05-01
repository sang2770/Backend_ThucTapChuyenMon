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
            'name_category' => "Woman",
        ]);
        tb_category::insert([
            'name_category' => "Men's",
        ]);
        tb_category::insert([
            'name_category' => "Summer",
        ]);
    }
}
