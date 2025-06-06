<x-app-layout>
@extends('layouts.admin')

@section('header', 'Manage Applications')

<!-- Page Heading -->

                <h1 class="text-2xl font-bold text-gray-800" style="margin-left: 20rem;margin-top: 1rem;">
                 Manage Applications
                </h1>

@section('content')
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="p-4 border-b border-gray-200">
        <form action="{{ route('admin.applications.index') }}" method="GET" class="flex items-center">
            <select name="status" class="mr-2 shadow border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">All Statuses</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="interview" {{ request('status') == 'interview' ? 'selected' : '' }}>Interview</option>
                <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Filter
            </button>
        </form>
    </div>

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
                    Applied Date
                </th>
                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Interview Date
                </th>
                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach($applications as $application)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">
                        {{ $application->user->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">
                        {{ $application->job->title }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">
                        @if($application->status == 'pending')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                Pending
                            </span>
                        @elseif($application->status == 'interview')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                Interview
                            </span>
                        @elseif($application->status == 'approved')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Approved
                            </span>
                        @elseif($application->status == 'rejected')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                Rejected
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">
                        {{ $application->created_at->format('M d, Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">
                        {{ $application->interview_date ? $application->interview_date->format('M d, Y H:i') : 'Not scheduled' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right border-b border-gray-200">
                        <a href="{{ route('admin.applications.show', $application) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="px-6 py-4">
        {{ $applications->links() }}
    </div>
</div>
@endsection
</x-app-layout>


