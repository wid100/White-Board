<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolicyStream extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'tag_id',
        'title',
        'slug',
        'post_type',
        'author_id',
        'post_date',
        'description',
        'meta_title',
        'meta_tag',
        'meta_description',
        'status',
        'image', // Add 'image' if you're saving image paths in the database
    ];
    // In Post model
    protected $dates = ['post_date'];



    // Define the relationship with Issue
    public function issue()
    {
        return $this->belongsTo(Issue::class);
    }

    // Define the relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Define the relationship with Tag
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    // Define the relationship with Author (User)
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // Casts for JSON and Date
    protected $casts = [
        'meta_tag' => 'array',
        'post_date' => 'datetime',
        'status' => 'boolean',
    ];
}
