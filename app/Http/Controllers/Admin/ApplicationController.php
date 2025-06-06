<?php

namespace App\Http\Controllers\Admin;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
   public function index()
    {
        $applications = Application::with(['job', 'user'])
            ->latest()
            ->paginate(10);

        return view('admin.applications.index', compact('applications'));
    }

    public function show(Application $application)
    {
        return view('admin.applications.show', compact('application'));
    }

    public function setInterview(Request $request, Application $application)
    {
        $request->validate([
            'interview_date' => 'required|date',
        ]);

        $application->update([
            'status' => 'interview',
            'interview_date' => $request->interview_date,
        ]);

        // Send email notification to applicant
        // ...

        return redirect()->route('admin.applications.show', $application)
            ->with('success', 'Interview scheduled successfully');
    }

    public function approve(Application $application)
    {
        $application->update([
            'status' => 'approved',
        ]);

        // Send email notification to applicant
        // ...

        return redirect()->route('admin.applications.show', $application)
            ->with('success', 'Application approved successfully');
    }

    public function reject(Request $request, Application $application)
    {
        $request->validate([
            'rejection_reason' => 'required|string',
        ]);

        $application->update([
            'status' => 'rejected',
            'rejection_reason' => $request->rejection_reason,
        ]);

        // Send email notification to applicant
        // ...

        return redirect()->route('admin.applications.show', $application)
            ->with('success', 'Application rejected successfully');
    }
}

