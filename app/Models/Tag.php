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
}
