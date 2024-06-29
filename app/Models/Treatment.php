<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;
    protected $casts = [
        'date'=>'date'
    ];
    protected $fillable = [
        'start_date',
        'provider_id',
        'user_id',
        'description'
    ];
}
