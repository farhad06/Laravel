<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     #$faker = Faker::create();
     public function run(): void
     {
        $faker =Faker::create();
        for($i=1;$i<=100;$i++){
            $p = new Person();

            $p->name = $faker->name();
            $p->email = $faker->email();
            $p->phone = $faker->phoneNumber();

            $p->save();
        }
    }
}
