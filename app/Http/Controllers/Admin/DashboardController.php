<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller{

    public function index(){
        $jobs = Job::all();
        $is_active = Job::where('is_active', 1)->count();
        $is_inactive = Job::where('is_active', 0)->count();
        $applicaions = Application::count();

    return view('dashboard', compact('jobs', 'is_active', 'is_inactive', 'applicaions'));
    }


}

