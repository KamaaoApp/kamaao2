<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'legal_name',
        'popular_name',
        'url',
        'logo',
        'about',
        'is_enabled',
    ];
}
