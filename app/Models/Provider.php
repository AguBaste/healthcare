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
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function specialty(){
        return $this->belongsTo(Specialty::class);
    }
    public function prescription(){
        return $this->hasMany(Prescription::class);
    }
    public function diagnostic(){
        return $this->hasMany(Diagnostic::class);
    }
}
