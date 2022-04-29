<?php

namespace Database\Seeders;

use App\Models\tb_comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tb_comment::insert([
            'time'=>'2022-1-1',
            'content'=>"Hài lòng",
            'rate'=>4,
            'id_user'=>1,
            'id_product'=>1,
        ]);
        
        
    }
}
