@extends('layouts.admin')

@section('header', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-medium mb-4">Active Jobs</h2>
        <p class="text-3xl font-bold">{{ \App\Models\Job::where('is_active', true)->count() }}</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-medium mb-4">New Applications</h2>
        <p class="text-3xl font-bold">{{ \App\Models\Application::where('status', 'pending')->count() }}</p>
    </div>

    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-medium mb-4">Upcoming Interviews</h2>
        <p class="text-3xl font-bold">
            {{ \App\Models\Application::where('status', 'interview')
                ->whereDate('interview_date', '>=', now())
                ->count() }}
        </p>
    </div>
</div>

<div class="mt-8 bg-white p-6 rounded-lg shadow">
    <h2 class="text-lg font-medium mb-4">Recent Applications</h2>

    <table class="min-w-full">
        <thead>
            <tr>
                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Applicant
                </th>
                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Job
                </th>
                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Status
                </th>
                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Date
                </th>
                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach(\App\Models\Application::with(['job', 'user'])->latest()->take(5)->get() as $application)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">
                        @if($job->is_active)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Active
                            </span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                Inactive
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">
                        {{ $job->applications->count() }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right border-b border-gray-200">
                        <a href="{{ route('admin.jobs.edit', $job) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                        <form action="{{ route('admin.jobs.destroy', $job) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this job?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="px-6 py-4">
        {{ $jobs->links() }}
    </div>
</div>
@endsection
