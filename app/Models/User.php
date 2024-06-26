<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'dob',
        'dni',
        'role_id',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function pressure(){
        return $this->hasMany(Pressure::class);
    }
    public function chart(){
        return $this->hasMany(Chart::class);
    }
    public function diabete(){
        return $this->hasMany(Diabete::class);
    }
    public function appointment(){
        return $this->hasMany(Appointment::class);
    }
    public function alergy(){
        return $this->belongsToMany(Alergy::class);
    }
    public function diagnostic(){
        return $this->belongsToMany(Diagnostic::class);
    }
    public function provider(){
        return $this->hasMany(Provider::class);
    }
}
