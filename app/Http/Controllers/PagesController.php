<?php

namespace App\Http\Controllers;

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
        $data['maxLeaveInfos'] = MaxLeaveInfo::all();
        return view('pages.application', $data);
    }

    public function redirectToHomeView()
    {
        return redirect()->route('homeView');
    }
}
