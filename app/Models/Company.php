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
        'company_legal_name',
        'company_popular_name',
        'company_url',
        'company_logo',
        'about_company',
        'is_enabled',
    ];
}
