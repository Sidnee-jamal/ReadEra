<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title', 'author', 'description',
        'is_premium', 'cover_image', 'file_path'
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'book_genre');
    }
}
