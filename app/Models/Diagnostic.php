<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostic extends Model
{
    protected $fillable = [
        'description',
        'provider_id',
        'user_id'
    ];
    use HasFactory;
    public function user(){
        return $this->belongsToMany(User::class);
    }
}
