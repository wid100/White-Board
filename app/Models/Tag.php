<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'author', 'description', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'author');
    }
    // Define the inverse relationship with Post
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
