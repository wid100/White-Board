<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Politic extends Model
{
    use HasFactory;
    protected $table = 'politics';
    protected $fillable = [
        'title',
        'description',
        'name',
        'designation',
        'status',
    ];
}
