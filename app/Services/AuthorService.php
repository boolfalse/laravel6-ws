<?php

namespace App\Services;

use App\Models\Author;

class AuthorService
{
    public function generatePublicId(): string
    {
        //ss https://stackoverflow.com/questions/4356289/php-random-string-generator/46910221#46910221
        $public_id = substr(md5(mt_rand()), 0, 12);

        return $public_id;
    }

    public function getAllToArray()
    {
        $authors = Author::all()->toArray();

        return $authors;
    }

    public function generateAuthorImage(): string
    {
        return 'image.jpg';
    }

    public function getGeneratedImageName(): string
    {
        $image_name = $this->generateAuthorImage();

        return $image_name;
    }
}
