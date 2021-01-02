<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use App\Models\MaxLeaveInfo;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function homeView()
    {
        return view('pages.home');
    }

    public function leaveApplicationView()
    {
        $data['leaveTypes'] = LeaveType::all();
        return view('pages.application', $data);
    }

    public function redirectToHomeView()
    {
        return redirect()->route('homeView');
    }
}
