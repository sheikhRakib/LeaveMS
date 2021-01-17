<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewLeaveApplicationRequest;
use App\Models\LeaveApplication;
use App\Models\User;
use App\Notifications\ApplicationApprovedNotification;
use App\Notifications\ApplicationRejectedNotification;
use App\Notifications\NewApplicationNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

class LeaveApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(NewLeaveApplicationRequest $request)
    {
        $application = new LeaveApplication();

        $application->reason        = $request['reason'];
        $application->information   = $request['information'];
        $application->applier_user_id = Auth::id();
        $application->start_date    = $request['start_date'];
        $application->end_date      = $request['end_date'];
        $application->leave_type_id = $request['leave_type'];

        $application->save();

        $users = User::role(['line manager', 'admin'])->get();
        Notification::send($users, new NewApplicationNotification($application));

        Session::Flash('success', 'Application Submitted Successfully.');
        return redirect()->route('homeView');
    }
    
    public function update(Request $request, LeaveApplication $application)
    {
        $application->remarks = $request['remarks'];
        $application->authorizer_user_id = Auth::id();

        if($request->has('approved')) {
            $application->status = 'approved';
        } else {
            $application->status = 'rejected';
        }
        $application->save();

        $applier = User::findOrFail($application->applier_user_id);
        if($request->has('approved')) {
            $users = User::role(['payroll'])->get();
            Notification::send($users, new ApplicationApprovedNotification($application));
            Notification::send($applier, new ApplicationApprovedNotification($application));
        } else {
            Notification::send($applier, new ApplicationRejectedNotification($application));
        }

        return redirect()->back();
    }
}
