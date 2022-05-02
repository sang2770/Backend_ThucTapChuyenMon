<?php

namespace Database\Seeders;

use App\Models\tb_size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        tb_size::insert([
            'size'=>'M'
        ]);
        tb_size::insert([
            'size'=>'S'
        ]);
        tb_size::insert([
            'size'=>'L'
        ]);
        tb_size::insert([
            'size'=>'XL'
        ]);
    }
}
