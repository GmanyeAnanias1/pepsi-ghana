<?php

namespace App\Http\Controllers\Applicant;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = auth()->user()->applications()
            ->with('job')
            ->latest()
            ->paginate(10);

        return view('applicant.applications.index', compact('applications'));
    }

    public function show(Application $application)
    {
        // Check if application belongs to authenticated user
        if ($application->user_id !== auth()->id()) {
            abort(403);
        }

        return view('applicant.applications.show', compact('application'));
    }
}
