<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class PostSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        for($i=1; $i<=50; $i++){
            $this->db->table('Posts')->insert([
                'name'=> $faker->sentence(4),
                'desc'=> $faker->paragraph,
                'user_id'=> rand(1, 10),
                'active'=> rand(0,1)
            ]);
        }
    }
}
