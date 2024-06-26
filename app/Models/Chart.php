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
        'member_id',
        'user_id',
        'insurance_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function insurance(){
        return $this->belongsTo(Insurance::class);
    }
}