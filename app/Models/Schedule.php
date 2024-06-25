<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'start',
        'end',
        'day',
        'break_start',
        'break_end',
        'provider_id'
    ];
    public function provider(){
        return $this->belongsTo(Provider::class);
    }
}
