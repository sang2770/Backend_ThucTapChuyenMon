<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(categorySeeder::class);
        $this->call(productSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CartSeeder::class);
        $this->call(ShipInfoSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(OrderDetailSeeder::class);
        $this->call(InfoSeeder::class);
        $this->call(CommentSeeder::class);
    }
}
