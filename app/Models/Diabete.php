<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diabete extends Model
{
    use HasFactory;
    protected $fillable=[
        'bsl',
        'date',
        'time',
        'comment',
        'user_id'
    ];
    protected $casts =[
        'date'=> 'date'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
