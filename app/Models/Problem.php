<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    use HasFactory;

    protected $fillable = ['call_id', 'specialist_id', 'problem_type'];

    // A problem is related to one call
    public function call()
    {
        return $this->belongsTo(Call::class);
    }

    // A problem is assigned to one specialist
    public function specialist()
    {
        return $this->belongsTo(Specialist::class);
    }
}
