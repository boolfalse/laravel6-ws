<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function generatePublicId(): string
    {
        $public_id = substr(md5(mt_rand()), 0, 12);

        return $public_id;
    }

    public function registerUser($data): User
    {
        $user = User::create([
            'public_id' => $this->generatePublicId(),
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return $user;
    }
}
