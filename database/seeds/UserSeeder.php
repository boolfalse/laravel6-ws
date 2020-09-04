<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use App\Services\UserService;
use App\Services\CarbonService;

class UserSeeder extends Seeder
{
    public function run()
    {
        $userService = new UserService();
        $faker = Factory::create();
        $users = [];
        $carbon = new CarbonService();

        for ($i = 0; $i < 10; $i++) {
            $users[] = [
                'public_id' => $userService->generatePublicId(),
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('secret'),
                'created_at' => $carbon->getNow(),
                'updated_at' => $carbon->getNow(),
            ];
        }

        DB::table('users')->insert($users);
    }
}
