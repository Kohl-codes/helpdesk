<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resolution extends Model
{
    use HasFactory;

    protected $fillable = ['call_id', 'resolution_description', 'resolved_at', 'time_taken'];

    // A resolution belongs to one call
    public function call()
    {
        return $this->belongsTo(Call::class);
    }
}
