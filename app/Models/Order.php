<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $casts = [
        'date'=>'date' 
    ];
    protected $fillable = [
        'date',
        'user_id',
        'provider_id',
        'diagnostic',
        'study'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
