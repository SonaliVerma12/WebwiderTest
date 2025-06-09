<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for($i=1; $i<=10; $i++){
            $this->db->table('users')->insert([
                'name'=>$faker->name,
                'email'=>$faker->unique()->email
            ]);

        }
    }
}
