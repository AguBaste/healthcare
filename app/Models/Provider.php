<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
    public function schedule(){
        return $this->hasMany(Schedule::class);
    }
    public function appointment(){
        return $this->hasMany(Appointment::class);
    }
}
