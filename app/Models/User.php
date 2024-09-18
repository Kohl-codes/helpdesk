<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'job_title', 'department', 'role'];

    // Automatically hash the password before storing it
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    // A user can be a caller in many calls
    public function callsAsCaller()
    {
        return $this->hasMany(Call::class, 'caller_id');
    }

    // A user can be an operator in many calls
    public function callsAsOperator()
    {
        return $this->hasMany(Call::class, 'operator_id');
    }

    // A user can be a specialist if the role matches
    public function specialist()
    {
        return $this->hasOne(Specialist::class);
    }
}
