<x-app-layout>
@extends('layouts.applicant')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Dashboard') }}
        </h2>
    </x-slot>



<div class="bg-white p-6 rounded-lg shadow-md max-w-7xl mx-auto mt-4">
    {{-- <h1 class="text-3xl font-bold mb-8 text-gray-800">Dashboard</h1> --}}

    {{-- Summary Cards --}}    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-blue-100 p-6 rounded-lg shadow hover:shadow-lg transition duration-300">
            <h2 class="text-xl font-semibold text-blue-800 mb-2">My Applications</h2>
            <p class="text-4xl font-bold text-blue-900 mb-4">{{ auth()->user()->applications->count() }}</p>
            <a href="{{ route('applicant.applications.index') }}" class="text-blue-700 hover:underline">View all applications →</a>
        </div>

        <div class="bg-green-100 p-6 rounded-lg shadow hover:shadow-lg transition duration-300">
            <h2 class="text-xl font-semibold text-green-800 mb-2">Available Jobs</h2>

            <p class="text-4xl font-bold text-green-900 mb-4">{{ \App\Models\Job::where('is_active', true)->count() }}</p>
            <a href="{{ route('applicant.jobs.index') }}" class="text-green-700 hover:underline">Browse open positions →</a>
        </div>
    </div>

    {{-- Application Status Table --}}
    <div class="mt-10">
        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Application Status</h2>

        <div class="overflow-x-auto rounded-lg shadow">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Job Title</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Status</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Applied Date</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Interview Date</th>
                        <th class="px-6 py-3 text-right text-sm font-semibold text-gray-700">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse(auth()->user()->applications()->with('job')->latest()->take(5)->get() as $application)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900">
                                {{ $application->job->title ?? 'N/A' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $statuses = [
                                        'pending' => ['Pending', 'bg-yellow-100', 'text-yellow-800'],
                                        'interview' => ['Interview', 'bg-blue-100', 'text-blue-800'],
                                        'approved' => ['Approved', 'bg-green-100', 'text-green-800'],
                                        'rejected' => ['Rejected', 'bg-red-100', 'text-red-800'],
                                    ];
                                    $status = $statuses[$application->status] ?? ['Unknown', 'bg-gray-100', 'text-gray-800'];
                                @endphp
                                <span class="px-2 inline-flex text-xs font-semibold rounded-full {{ $status[1] }} {{ $status[2] }}">
                                    {{ $status[0] }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-600">
                                {{ $application->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-600">
                                {{ $application->interview_date ? \Carbon\Carbon::parse($application->interview_date)->format('M d, Y') : 'TBD' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <a href="{{ route('admin.applications.show', $application) }}" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                You haven't submitted any applications yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <a href="/" class="mt-6 inline-flex items-center text-blue-600 hover:underline">
    <i class="fas fa-arrow-left mr-2 text-red-600"></i>
    Back to Home
</a>

</div>

</x-app-layout>
