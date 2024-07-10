<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'status', 'creator', 'slug'];



    public function user()
    {
        return $this->belongsTo(User::class, 'creator');
    }
}
