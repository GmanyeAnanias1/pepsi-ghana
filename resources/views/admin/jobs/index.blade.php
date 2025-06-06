<x-app-layout>
@extends('layouts.admin')

@section('header', 'Manage Jobs')

<h1 class="text-2xl font-bold text-gray-800" style="margin-left: 20rem;margin-top: 1rem;">
                 Manage Jobs
                </h1>

@section('content')
<div class="flex justify-end mb-4">
    <a href="{{ route('admin.jobs.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Post New Job
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full">
        <thead>
            <tr>
                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Title
                </th>
                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Location
                </th>
                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Type
                </th>
                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Status
                </th>
                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Applications
                </th>
               <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Actions
                </th>
                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach($jobs as $job)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">
                        {{ $job->title }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">
                        {{ $job->location }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">
                        {{ $job->job_type }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">
                        @if($job->is_active)
                            <span class="inline-flex px-2 py-1 text-xs font-semibold leading-5 rounded-full bg-green-100 text-green-800">Active</span>
                        @else
                            <span class="inline-flex px-2 py-1 text-xs font-semibold leading-5 rounded-full bg-red-100 text-red-800">Inactive</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200">
                        {{ $job->applications_count ?? $job->applications->count() }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap border-b border-gray-200 text-right">
                        <a href="{{ route('admin.jobs.show', $job) }}" class="text-blue-600 hover:text-blue-900 mr-2">View</a>
                        <a href="{{ route('admin.jobs.edit', $job) }}" class="text-yellow-600 hover:text-yellow-900 mr-2">Edit</a>
                        <form action="{{ route('admin.jobs.destroy', $job) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this job?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            @if($jobs->isEmpty())
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                        No jobs found.
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

<!-- Pagination (if using Laravel pagination) -->
<div class="mt-4">
    {{ $jobs->links() }}
</div>
@endsection
</x-app-layout>
