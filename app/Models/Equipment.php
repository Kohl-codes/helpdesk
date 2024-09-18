<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = ['serial_number', 'type', 'make', 'licensed'];

    // An equipment can be linked to multiple calls
    public function calls()
    {
        return $this->hasMany(Call::class);
    }
}
