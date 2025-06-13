<?php

namespace App\Http\Controllers\Applicant;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $query = Job::where('is_active', true);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        $jobs = $query->latest()->paginate(6);
        return view('applicant.jobs.index', compact('jobs'));
    }

    public function show(Job $job)
    {
        $hasApplied = auth()->user()->applications()->where('job_id', $job->id)->exists();
        return view('applicant.jobs.show', compact('job', 'hasApplied'));
    }
public function showApplyForm($jobId)
{
    $job = Job::findOrFail($jobId);
    return view('applicant.jobs.apply', compact('job'));
}

   public function apply(Request $request, Job $job)
    {
        $request->validate([
            'cover_letter' => 'required|string',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Store resume file
        $resumePath = $request->file('resume')->store('resumes', 'public');

        // Create application
        auth()->user()->applications()->create([
            'job_id' => $job->id,
            'cover_letter' => $request->cover_letter,
            'resume_path' => $resumePath,
            'status' => 'pending',
        ]);

        return redirect()->route('applicant.applications.index')
                  ->with('success', 'Application submitted successfully!');
    }

}
