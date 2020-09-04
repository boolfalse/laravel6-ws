<?php

use Faker\Factory;
use Illuminate\Support\Facades\DB;
use App\Services\PostService;
use App\Services\AuthorService;
use App\Services\CarbonService;

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $posts = [];
        $carbon = new CarbonService();

        $postService = new PostService();
        $authorService = new AuthorService();

        $authors = $authorService->getAllToArray();
        $authors_count = count($authors);

        for ($i = 0; $i < 20; $i++) {
            $posts[] = [
                'public_id' => $postService->generatePublicId(),
                'author_id' => $authors[rand(0, $authors_count - 1)]['id'],
                'title' => $faker->title,
                'description' => $faker->sentences(5, true),
                'created_at' => $carbon->getNow(),
                'updated_at' => $carbon->getNow(),
            ];
        }

        DB::table('posts')->insert($posts);
    }
}
