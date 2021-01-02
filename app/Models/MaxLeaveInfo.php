<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaxLeaveInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'leave_type',
        'days',
    ];

    public function getLeaveTypeAttribute($value)
    {
        return ucwords($value);
    }
}
