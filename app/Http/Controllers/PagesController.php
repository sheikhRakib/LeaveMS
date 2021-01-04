<?php

namespace App\Http\Controllers;

use App\Models\LeaveApplication;
use App\Models\LeaveType;
use App\Models\MaxLeaveInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function redirectToHomeView()
    {
        return redirect()->route('homeView');
    }

    public function homeView()
    {
        $data['myApplications'] = LeaveApplication::MyApplications()
        ->AddLeaveType()
        ->paginate(5);

        $data['leaveStat'] = LeaveApplication::MyApplications()
        ->select('status', DB::raw('count(status) as total'))
        ->groupBy('status')
        ->pluck('total','status');
        
        return view('pages.home', $data);
    }

    public function leaveApplicationView()
    {
        $data['leaveTypes'] = LeaveType::all();
        return view('pages.application', $data);
    }

    public function actionView()
    {
        return "dsa";
    }
}
