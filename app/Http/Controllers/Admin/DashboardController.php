<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller{

    public function index(){
        $jobs = Job::all();
        $is_active = Job::where('is_active', 1)->count();
        $is_inactive = Job::where('is_active', 0)->count();
        $applicaions = Application::count();

        //Fetching the number of applications per month

        $rawData = DB::table('applications')
        ->select(
            DB::raw("COUNT(*) as count"),
            DB::raw("MONTH(created_at) as month_num")
        )
        ->groupBy(DB::raw("MONTH(created_at)"))
        ->pluck('count', 'month_num'); // returns [1 => 10, 2 => 15, ...]

    // Step 2: Generate all months
    $allMonths = [
        1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr',
        5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug',
        9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec'
    ];

    // Step 3: Fill in 0s for months with no data
    $months = [];
    $counts = [];

    foreach ($allMonths as $num => $name) {
        $months[] = $name;
        $counts[] = $rawData[$num] ?? 0;
    }

    // Pie Chart Data
    $interviewed = DB::table('applications')->where('status', 'interview')->count();
    $approved = DB::table('applications')->where('status', 'approved')->count();
    $rejected = DB::table('applications')->where('status', 'rejected')->count();

    return view('dashboard', compact('jobs', 'is_active', 'is_inactive', 'applicaions','months', 'counts',
        'interviewed', 'approved', 'rejected'));
    }


}

