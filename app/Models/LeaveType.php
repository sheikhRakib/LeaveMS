<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'days',
    ];

    // public function getTypeAttribute($value)
    // {
    //     return ucwords($value);
    // }
}
