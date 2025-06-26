<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller

{
    public function index()
    {
        // Fetch the latest jobs with pagination

        $jobs = Job::latest()->paginate(5);
        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('admin.jobs.create');
    }

   public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'location' => 'required|string|max:255',
        'job_type' => 'required|string|max:255',
        'salary' => 'nullable|numeric',
        'requirements' => 'nullable|string',
        'responsibilities' => 'nullable|string',
    ]);

    Job::create($validated);

    return redirect()->route('admin.jobs.index')->with('success', 'Job posted successfully!');
}

public function show($id){
     $job = Job::findOrFail($id);
     return view('admin.jobs.show', compact('job'));
}

public function edit(Job $job)
{
    $job = Job::findOrFail($job->id);
    return view('admin.jobs.edit', compact('job'));
}

public function update(Request $request, Job $job)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'location' => 'required|string|max:255',
        'job_type' => 'required|string|max:255',
        'salary' => 'nullable|numeric',
        'requirements' => 'nullable|string',
        'responsibilities' => 'nullable|string',
        'is_active' => 'boolean',
    ]);

    $job->update($validated);

    return response()->json([
        'message' => 'Job updated successfully',
        'data' => $job
    ]);
}

public function destroy(Job $job)
{
    $job->delete();

    return redirect()->route('admin.jobs.index')
        ->with('success', 'Job deleted successfully.');
}



}
