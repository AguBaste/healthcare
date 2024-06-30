<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $casts = [
        'date'=> 'date'
    ];
    protected $fillable = [
        'dosis',
        'patient',
        'insurance',
        'provider_id',
        'formula',
        'diagnostic',
        'date'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function provider(){
        return $this->belongsTo(Provider::class);
    }
}
