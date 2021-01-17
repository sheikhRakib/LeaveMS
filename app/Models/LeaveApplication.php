<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class LeaveApplication extends Model
{
    use HasFactory;

    protected $casts = [
        'start_date' => 'date',
    ];

    public function applier()
    {
        return $this->hasOne(User::class, 'id', 'applier_user_id');
    }

    public function getStartDateAttribute($value)
    {
        return (new Carbon($value))->toFormattedDateString();
    }
    public function getEndDateAttribute($value)
    {
        return ($value) ? (new Carbon($value))->toFormattedDateString() : $value;
    }

    public function getCreatedAtAttribute($value)
    {
        return (new Carbon($value))->toFormattedDateString();
    }

    public function getDurationAttribute()
    {
        return (new Carbon($this->end_date))->diffInDays(new Carbon($this->start_date))+1;
    }

    public function scopeMyApplications($query)
    {
        return $query->where('leave_applications.applier_user_id', Auth::id())
        ->latest('leave_applications.id')
        ->select(
            'leave_applications.id as id', 
            'leave_applications.reason', 
            'leave_applications.information', 
            'leave_applications.start_date',
            'leave_applications.end_date', 
            'leave_applications.status',
            'leave_applications.remarks',
        );
    }
    
    public function scopeAddLeaveType($query)
    {
        return $query->join('leave_types', 'leave_types.id', '=', 'leave_applications.leave_type_id')
        ->addSelect('leave_types.type');
    }
}
