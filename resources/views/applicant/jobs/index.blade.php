<x-app-layout>
@extends('layouts.applicant')
@section('title', 'Available Jobs')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Available Job Opportunities</h1>
        <p class="text-gray-600">Discover your next career opportunity</p>
    </div>

    <!-- Search Bar -->
    <div class="mb-8">
        <form method="GET" action="{{ route('applicant.jobs.index') }}" class="max-w-md mx-auto">
            <div class="relative">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search jobs by title, description, or location..."
                    class="w-full px-4 py-3 pl-12 pr-4 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                >
                <div class="absolute inset-y-0 left-0 flex items-center pl-4">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <button
                    type="submit"
                    class="absolute inset-y-0 right-0 flex items-center px-4 text-white bg-blue-600 rounded-r-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-200"
                >
                    Search
                </button>
            </div>
        </form>
    </div>

    <!-- Search Results Info -->
    @if(request('search'))
        <div class="mb-6">
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <p class="text-blue-800">
                    <span class="font-semibold">{{ $duties->total() }}</span> job(s) found for
                    <span class="font-semibold">"{{ request('search') }}"</span>
                    <a href="{{ route('applicant.jobs.index') }}" class="ml-2 text-blue-600 hover:text-blue-800 underline">
                        Clear search
                    </a>
                </p>
            </div>
        </div>
    @endif

    <!-- Jobs Grid -->
    @if($jobs->count() > 0)
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach($jobs as $job)
                <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 border border-gray-200">
                    <div class="p-6">
                        <!-- Job Title -->
                        <h3 class="text-xl font-semibold text-gray-800 mb-2 line-clamp-2">
                            {{ $job->title }}
                        </h3>

                        <!-- Location -->
                        <div class="flex items-center text-gray-600 mb-3">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-sm">{{ $job->location ?? 'Not specified' }}</span>
                        </div>

                        <!-- Job Description -->
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            {{ Str::limit($job->description, 150) }}
                        </p>

                        <!-- Job Details -->
                        <div class="space-y-2 mb-4">
                            @if($job->job_type)
                                <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                                    {{ $job->job_type }}
                                </span>
                            @endif

                            @if($job->salary)
                                <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">
                                    {{ $job->salary }}
                                </span>
                            @endif
                        </div>

                        <!-- Posted Date -->
                        {{-- <div class="text-xs text-gray-500 mb-4">
                            Posted {{ $job->created_at->diffForHumans() }}
                        </div> --}}

                        <!-- Action Buttons -->
                        <div class="flex gap-2">
                            <a
                                href="{{ route('applicant.jobs.show', $job->id) }}"
                                class="flex-1 bg-blue-600 text-gray text-center py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors duration-200 text-sm font-medium"
                          >
                                View Details
                            </a>
                            <a
                                href="{{ route('applicant.jobs.apply', $job->id) }}"
                                class="flex-1 bg-green-600 text-warning text-center py-2 px-4 rounded-lg hover:bg-green-700 transition-colors duration-200 text-sm font-medium"
                            >
                                Apply Now
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $jobs->appends(request()->query())->links() }}
        </div>
    @else
        <!-- No Jobs Found -->
        <div class="text-center py-12">
            <div class="max-w-md mx-auto">
                <svg class="mx-auto h-24 w-24 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2h8zM8 14v.01M16 14v.01"></path>
                </svg>
                <h3 class="mt-4 text-lg font-semibold text-gray-700">No jobs available</h3>
                <p class="mt-2 text-gray-500">
                    @if(request('search'))
                        No jobs match your search criteria. Try adjusting your search terms.
                    @else
                        There are no active job postings at the moment. Please check back later.
                    @endif
                </p>
                @if(request('search'))
                    <a
                        href="{{ route('applicant.jobs.index') }}"
                        class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200"
                    >
                        View All Jobs
                    </a>
                @endif
            </div>
        </div>
    @endif
</div>
</x-app-layout>
