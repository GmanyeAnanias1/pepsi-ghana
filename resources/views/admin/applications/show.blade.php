<x-app-layout>
@extends('layouts.admin')

@section('header', 'Application Details')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <div class="mb-6">
        <h2 class="text-lg font-medium mb-2">Applicant Information</h2>
        <div class="border-t border-gray-200 pt-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <span class="text-gray-500">Name:</span>
                    <span class="ml-2">{{ $application->user->name }}</span>
                </div>
                <div>
                    <span class="text-gray-500">Email:</span>
                    <span class="ml-2">{{ $application->user->email }}</span>
                </div>
                <div>
                    <span class="text-gray-500">Phone:</span>
                    <span class="ml-2">{{ $application->user->phone ?: 'Not provided' }}</span>
                </div>
                <div>
                    <span class="text-gray-500">Applied:</span>
                    <span class="ml-2">{{ $application->created_at->format('M d, Y') }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-6">
        <h2 class="text-lg font-medium mb-2">Job Details</h2>
        <div class="border-t border-gray-200 pt-4">
            <div class="mb-2">
                <span class="text-gray-500">Title:</span>
                <span class="ml-2 font-medium">{{ $application->job->title }}</span>
            </div>
            <div class="mb-2">
                <span class="text-gray-500">Location:</span>
                <span class="ml-2">{{ $application->job->location }}</span>
            </div>
            <div class="mb-2">
                <span class="text-gray-500">Type:</span>
                <span class="ml-2">{{ $application->job->type }}</span>
            </div>
        </div>
    </div>

    <div class="mb-6">
        <h2 class="text-lg font-medium mb-2">Cover Letter</h2>
        <div class="border-t border-gray-200 pt-4">
            <p class="text-gray-700">{{ $application->cover_letter }}</p>
        </div>
    </div>

    <div class="mb-6">
        <h2 class="text-lg font-medium mb-2">Resume</h2>
        <div class="border-t border-gray-200 pt-4">
            <a href="{{ Storage::url($application->resume_path) }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                View Resume
            </a>
        </div>
    </div>

    <div class="mb-6">
        <h2 class="text-lg font-medium mb-2">Application Status</h2>
        <div class="border-t border-gray-200 pt-4">
            <div class="mb-2">
                <span class="text-gray-500">Current Status:</span>
                @if($application->status == 'pending')
                    <span class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                        Pending
                    </span>
                @elseif($application->status == 'interview')
                    <span class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                        Interview
                    </span>
                @elseif($application->status == 'approved')
                    <span class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        Approved
                    </span>
                @elseif($application->status == 'rejected')
                    <span class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                        Rejected
                    </span>
                @endif
            </div>

            @if($application->interview_date)
                <div class="mb-2">
                    <span class="text-gray-500">Interview Date:</span>
                    <span class="ml-2">{{ $application->interview_date->format('M d, Y H:i') }}</span>
                </div>
            @endif

            @if($application->rejection_reason)
                <div class="mb-2">
                    <span class="text-gray-500">Rejection Reason:</span>
                    <span class="ml-2">{{ $application->rejection_reason }}</span>
                </div>
            @endif
        </div>
    </div>

    <div class="border-t border-gray-200 pt-6">
        <h2 class="text-lg font-medium mb-4">Action</h2>

        @if($application->status == 'pending')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <h3 class="text-sm font-medium mb-2">Schedule Interview</h3>
                    <form action="{{ route('admin.applications.interview', $application) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <input type="datetime-local" name="interview_date" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Schedule Interview
                        </button>
                    </form>
                </div>

                <div>
                    <h3 class="text-sm font-medium mb-2">Reject Application</h3>
                    <form action="{{ route('admin.applications.reject', $application) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <textarea name="rejection_reason" placeholder="Reason for rejection" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
                        </div>
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Reject Application
                        </button>
                    </form>
                </div>
            </div>
        @elseif($application->status == 'interview')
            <div class="flex space-x-4">
                <form action="{{ route('admin.applications.approve', $application) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Approve Application
                    </button>
                </form>

                <form action="{{ route('admin.applications.reject', $application) }}" method="POST" class="inline-block">
                    @csrf
                    <div class="mb-4">
                        <textarea name="rejection_reason" placeholder="Reason for rejection" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
                    </div>
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Reject Application
                    </button>
                </form>
            </div>
        @endif
    </div>
</div>

<div class="mt-4">
    <a href="{{ route('admin.applications.index') }}" class="text-gray-600 hover:text-gray-800">
        &larr; Back to all applications
    </a>
</div>
@endsection
</x-app-layout>
