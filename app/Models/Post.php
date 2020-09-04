<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'public_id',
        'author_id',
        'title',
        'description',
    ];

    public function author() {
        return $this->belongsTo(Author::class, 'author_id');
    }
}
