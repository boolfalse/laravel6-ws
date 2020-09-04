<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';

    protected $fillable = [
        'public_id',
        'name',
        'avatar',
    ];

    public function posts() {
        return $this->hasMany(Post::class, 'author_id');
    }
}
