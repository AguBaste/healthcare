<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    use HasFactory;
    protected $fillable=[
        'smoke',
        'glasses',
        'user_id',
        'height',
        'weight'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

}
