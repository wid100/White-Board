<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Month extends Model
{

    use HasFactory;

    public function issues()
    {
        return $this->hasMany(Issue::class, 'issue_month', 'id');
    }
}
