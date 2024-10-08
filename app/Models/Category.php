<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'author');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
