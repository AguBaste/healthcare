<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostic extends Model
{
    protected $casts = [
        'date'=>'date'
    ];
    protected $fillable = [
        'description',
        'provider_id',
        'user_id',
        'date',
        'treatment'
    ];
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function provider(){
        return $this->belongsTo(Provider::class);
    }
}
