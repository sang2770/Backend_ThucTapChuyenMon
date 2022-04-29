<?php

namespace Database\Seeders;

use App\Models\tb_systeminfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        tb_systeminfo::insert([
        'nameshop'=>'colorshop',
        'hotline'=>'0093212112',
        'aboutus'=>'There are many ways to contact us. You may drop us a line, give us a call or send an email, choose what suits you the most.'
        ]);
    }
}
