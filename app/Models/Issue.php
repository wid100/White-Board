<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $fillable = [
        'year_id',
        'editornote_id',
        'slug',
        'image',
        'issue_number',
        'issue_month',
        'name',
        'editorial_note',
        'status',
    ];


    public function year()
    {
        return $this->belongsTo(Year::class);
    }


    public function month()
    {
        return $this->belongsTo(Month::class, 'issue_month', 'id');
    }

    public function editornote()
    {
        return $this->belongsTo(Editornote::class);
    }

    // Define the inverse relationship with Post
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
