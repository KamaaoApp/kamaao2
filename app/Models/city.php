<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    use HasFactory;

    public function job(Type $var = null)
    {
        return $this->hasMany(Job::class);
    }
}
