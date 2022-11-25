<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSupport extends Model
{
    use HasFactory;
    protected $table = 'support_tickets';
    protected $fillable = ['description', 'user_id'];

}
