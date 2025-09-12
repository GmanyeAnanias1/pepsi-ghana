<x-app-layout>
@extends('layouts.applicant')
@section('title', 'Available Jobs')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50">
    <div class="container mx-auto px-4 py-12">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl mb-6 shadow-lg">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2h8zM8 14v.01M16 14v.01"></path>
                </svg>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-gray-900 via-blue-900 to-indigo-900 bg-clip-text text-transparent mb-4">
                Available Job Opportunities
            </h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Discover your next career opportunity from our curated selection of premium positions
            </p>
        </div>

        <!-- Enhanced Search Bar -->
        <div class="mb-12">
            <form method="GET" action="{{ route('applicant.jobs.index') }}" class="max-w-2xl mx-auto">
                <div class="relative group">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl blur opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
                    <div class="relative bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Search jobs by title, description, or location..."
                            class="w-full px-6 py-4 pl-14 pr-32 text-gray-700 bg-transparent border-0 focus:outline-none focus:ring-0 text-lg placeholder-gray-400"
                        >
                        <div class="absolute inset-y-0 left-0 flex items-center pl-5">
                            <svg class="w-6 h-6 text-gray-400 group-hover:text-blue-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <button
                            type="submit"
                            class="absolute inset-y-0 right-0 flex items-center px-8 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 transform hover:scale-105"
                        >
                            Search
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Enhanced Search Results Info -->
        @if(request('search'))
            <div class="mb-8">
                <div class="max-w-2xl mx-auto">
                    <div class="bg-white/80 backdrop-blur-sm border border-blue-200 rounded-2xl p-6 shadow-lg">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-800 font-medium">
                                        <span class="text-blue-600 font-bold">{{ $jobs->total() }}</span> job(s) found for
                                        <span class="font-bold text-gray-900">"{{ request('search') }}"</span>
                                    </p>
                                </div>
                            </div>
                            <a href="{{ route('applicant.jobs.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl font-medium transition-colors duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Clear
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Enhanced Jobs Grid -->
        @if($jobs->count() > 0)
            <div class="grid gap-8 md:grid-cols-2 xl:grid-cols-3">
                @foreach($jobs as $job)
                    <div class="group relative">
                        <!-- Gradient Background Effect -->
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-3xl blur opacity-0 group-hover:opacity-10 transition-opacity duration-500"></div>

                        <!-- Main Card -->
                        <div class="relative bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 overflow-hidden group-hover:border-blue-200 group-hover:-translate-y-2">
                            <!-- Card Header -->
                            <div class="p-8 pb-6">
                                <!-- Job Title -->
                                <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-900 transition-colors duration-300 leading-tight">
                                    {{ $job->title }}
                                </h3>

                                <!-- Location -->
                                <div class="flex items-center text-gray-600 mb-4">
                                    <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-blue-50 transition-colors duration-300">
                                        <svg class="w-4 h-4 text-gray-500 group-hover:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium">{{ $job->location ?? 'Remote' }}</span>
                                </div>

                                <!-- Job Description -->
                                <p class="text-gray-600 text-sm mb-6 leading-relaxed line-clamp-3">
                                    {{ Str::limit($job->description, 150) }}
                                </p>

                                <!-- Job Tags -->
                                <div class="flex flex-wrap gap-2 mb-6">
                                    @if($job->job_type)
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-200">
                                            <div class="w-2 h-2 bg-blue-400 rounded-full mr-2"></div>
                                            {{ $job->job_type }}
                                        </span>
                                    @endif

                                    @if($job->salary)
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            <div class="w-2 h-2 bg-emerald-400 rounded-full mr-2"></div>
                                            {{ $job->salary }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Card Footer -->
                            <div class="px-8 pb-8">
                                <div class="flex gap-3">
                                    <a
                                        href="{{ route('applicant.jobs.show', $job->id) }}"
                                        class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-800 text-center py-3 px-4 rounded-xl transition-all duration-200 text-sm font-semibold hover:shadow-md group/btn"
                                    >
                                        <span class="group-hover/btn:scale-105 inline-block transition-transform duration-200">View Details</span>
                                    </a>
                                    <a
                                        href="{{ route('applicant.jobs.apply', $job->id) }}"
                                        class="flex-1 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white text-center py-3 px-4 rounded-xl transition-all duration-200 text-sm font-semibold shadow-lg hover:shadow-xl group/btn"
                                    >
                                        <span class="group-hover/btn:scale-105 inline-block transition-transform duration-200">Apply Now</span>
                                    </a>
                                </div>
                            </div>

                            <!-- Hover Effect Accent -->
                            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-600 to-indigo-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Enhanced Pagination -->
            <div class="mt-16 flex justify-center">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-2">
                    {{ $jobs->appends(request()->query())->links() }}
                </div>
            </div>
        @else
            <!-- Enhanced No Jobs Found -->
            <div class="text-center py-20">
                <div class="max-w-md mx-auto">
                    <!-- Animated Icon -->
                    <div class="relative mb-8">
                        <div class="absolute inset-0 bg-gradient-to-r from-gray-200 to-gray-300 rounded-full blur-xl opacity-20 animate-pulse"></div>
                        <div class="relative w-32 h-32 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mx-auto shadow-lg">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2h8zM8 14v.01M16 14v.01"></path>
                            </svg>
                        </div>
                    </div>

                    <h3 class="text-2xl font-bold text-gray-800 mb-4">No jobs available</h3>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        @if(request('search'))
                            No jobs match your search criteria. Try broadening your search terms or exploring different keywords.
                        @else
                            There are no active job postings at the moment. New opportunities are added regularly, so please check back soon.
                        @endif
                    </p>

                    @if(request('search'))
                        <a
                            href="{{ route('applicant.jobs.index') }}"
                            class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl font-semibold hover:from-blue-700 hover:to-indigo-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105"
                        >
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                            View All Jobs
                        </a>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>
</x-app-layout>
