<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use App\Services\AuthorService;
use App\Services\CarbonService;

class AuthorSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $users = [];
        $authorService = new AuthorService();
        $carbon = new CarbonService();

        for ($i = 0; $i < 5; $i++) {
            $users[] = [
                'public_id' => $authorService->generatePublicId(),
                'name' => $faker->name,
                'avatar' => $authorService->getGeneratedImageName(),
                'created_at' => $carbon->getNow(),
                'updated_at' => $carbon->getNow(),
            ];
        }

        DB::table('authors')->insert($users);
    }
}
