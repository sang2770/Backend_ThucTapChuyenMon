<?php

namespace Database\Seeders;

use App\Models\tb_user;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tb_user::insert([
            'id_user' => "1",
            'name' => "Nguyễn Văn An",
            'email' => "an@gmail.com",
            'password' => Hash::make("123"),
        ]);
        tb_user::insert([
            'id_user' => "2",
            'name' => "Nguyễn Văn BÌnh",
            'email' => "binh@gmail.com",
            'password' => Hash::make("123"),
        ]);
        tb_user::insert([
            'id_user' => "3",
            'name' => "Nguyễn Văn Hoàng",
            'email' => "hoang@gmail.com",
            'password' => Hash::make("123"),
        ]);
        
    }
}
