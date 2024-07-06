<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for($i=1;$i<=10;$i++){
            student::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->email(),
                'age' => 25
            ]);

        }
       
    }
}
