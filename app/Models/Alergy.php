<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alergy extends Model
{
    use HasFactory;
    protected $fillable = [
        'description'
    ];
    public function user(){
        return $this->belongsToMany(User::class);
    }
}
