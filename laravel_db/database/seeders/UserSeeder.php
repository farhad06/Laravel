<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        for ($i = 1; $i <= 10; $i++) {
            
            User::create([
                'name'=>fake()->name(),
                'email'=>fake()->email(),
                'age'=>fake()->numberBetween(12,45),
                'city'=>fake()->city()
            ]);
        }
    }
}
