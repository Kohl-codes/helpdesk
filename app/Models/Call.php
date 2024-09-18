<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    use HasFactory;

    protected $fillable = ['caller_id', 'operator_id', 'equipment_id', 'description', 'call_time'];

    // A call is made by one user (caller)
    public function caller()
    {
        return $this->belongsTo(User::class, 'caller_id');
    }

    // A call is handled by one helpdesk operator
    public function operator()
    {
        return $this->belongsTo(User::class, 'operator_id');
    }

    // A call is related to one piece of equipment
    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    // A call can have multiple problems
    public function problems()
    {
        return $this->hasMany(Problem::class);
    }

    // A call can have one resolution
    public function resolution()
    {
        return $this->hasOne(Resolution::class);
    }
}
