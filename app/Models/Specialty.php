<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $fillable =[
        'description'
    ];
    use HasFactory;
    public function provider(){
        return $this->belongsTo(Provider::class);
    }
}
