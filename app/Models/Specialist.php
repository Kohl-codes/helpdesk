<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'expertise', 'current_load'];

    // A specialist is a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A specialist can handle multiple problems
    public function problems()
    {
        return $this->hasMany(Problem::class);
    }
}
