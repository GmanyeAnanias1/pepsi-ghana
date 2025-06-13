<x-app-layout>
@extends('layouts.applicant')


@section('title', $job->title)

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100" style="margin-top: -42rem;">
    <!-- Hero Section -->
    <div class="bg-white shadow-sm border-b">
        <div class="container mx-auto px-4 py-6">
            <!-- Breadcrumb -->
            <nav class="mb-4">
                <ol class="flex items-center space-x-2 text-sm text-gray-500">
                    <li>
                        <a href="{{ route('applicant.jobs.index') }}" class="hover:text-blue-600 transition-colors duration-200">
                            Jobs
                        </a>
                    </li>
                    <li>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </li>
                    <li class="text-gray-700 font-medium">{{ $job->title }}</li>
                </ol>
            </nav>

            <!-- Job Header -->
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                <div class="flex-1">
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $job->title }}</h1>

                    <div class="flex flex-wrap items-center gap-4 text-gray-600">
                        @if($job->company)
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H9m0 0H5m4 0v-5a1 1 0 011-1h4a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                <span class="font-medium">{{ $job->company }}</span>
                            </div>
                        @endif

                        @if($job->location)
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span>{{ $job->location }}</span>
                            </div>
                        @endif

                        {{-- <div class="flex items-center text-gray-500">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg> --}}
                            {{-- <span>Posted {{ $job->created_at->diffForHumans() }}</span> --}}
                        {{-- </div> --}}
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-3">
                    @if($hasApplied)
                        <div class="flex items-center px-6 py-3 bg-green-100 text-green-800 rounded-lg font-medium">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Already Applied
                        </div>
                        <a href="{{ route('applicant.applications.index') }}"
                           class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 font-medium text-center">
                            View My Applications
                        </a>
                    @else
                        {{-- <button onclick="window.print()"
                                class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200 font-medium">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                            </svg>
                            Save Job
                        </button> --}}
                        <a href="{{ route('applicant.jobs.apply', $job->id) }}"
                           class="px-8 py-3 bg-gradient-to-r from-green-600 to-indigo-600 text-white rounded-lg hover:from-blue-700 hover:to-indigo-700 transition-all duration-200 font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 text-center">
                            Apply Now
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Job Details -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Job Description -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Job Description
                    </h2>
                    <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                        {!! nl2br(e($job->description)) !!}
                    </div>
                </div>

                <!-- Requirements -->
                @if($job->requirements)
                    <div class="bg-white rounded-xl shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Requirements
                        </h2>
                        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                            {!! nl2br(e($job->requirements)) !!}
                        </div>
                    </div>
                @endif

                <!-- Benefits -->
                @if($job->benefits)
                    <div class="bg-white rounded-xl shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                            Benefits & Perks
                        </h2>
                        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                            {!! nl2br(e($job->benefits)) !!}
                        </div>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Job Summary -->
                <div class="bg-white rounded-xl shadow-lg p-6 sticky top-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Job Summary</h3>

                    <div class="space-y-4">
                        @if($job->job_type)
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Job Type</span>
                                <span class="text-gray-900 font-semibold">{{ $job->job_type }}</span>
                            </div>
                        @endif

                        @if($job->salary)
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Salary Range</span>
                                <span class="text-green-600 font-semibold">{{ $job->salary }}</span>
                            </div>
                        @endif

                        @if($job->experience_level)
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Experience Level</span>
                                <span class="text-gray-900 font-semibold">{{ $job->experience_level }}</span>
                            </div>
                        @endif

                        @if($job->department)
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">Department</span>
                                <span class="text-gray-900 font-semibold">{{ $job->department }}</span>
                            </div>
                        @endif

                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="text-gray-600 font-medium">Job ID</span>
                            <span class="text-gray-500 font-mono text-sm">#{{ $job->id }}</span>
                        </div>

                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="text-gray-600 font-medium">Responsibilties</span>
                            <span class="text-gray-500 font-mono text-sm">{{ $job->responsibilities }}</span>
                        </div>

                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <span class="text-gray-600 font-medium">Requirement</span>
                            <span class="text-gray-500 font-mono text-sm">{{ $job->requirements }}</span>
                        </div>

                        <div class="flex justify-between items-center py-2">
                            <span class="text-gray-600 font-medium">Posted Date</span>
                            {{-- <span class="text-gray-900 font-semibold">{{ $job->created_at->format('M d, Y') }}</span> --}}
                        </div>
                    </div>

                    <!-- Apply Button (Mobile Sticky) -->
                    @if(!$hasApplied)
                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <a href="{{ route('applicant.jobs.show', $job->id) }}"
                               class="w-full px-6 py-3 bg-gradient-to-r from-green-600 to-indigo-600 text-white rounded-lg hover:from-blue-700 hover:to-indigo-700 transition-all duration-200 font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 text-center block">
                                Apply for this Position
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Company Info -->
                @if($job->discription)
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">About the Job</h3>
                        <div class="text-center">
                            <div class="w-16 h-16 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="text-white font-bold text-xl">{{ substr($job->company, 0, 1) }}</span>
                            </div>
                            <h4 class="font-semibold text-gray-900 mb-2">{{ $job->company }}</h4>
                            @if($job->description)
                                <p class="text-gray-600 text-sm">{{ $job->company_description }}</p>
                            @endif
                        </div>
                    </div>
                @endif
<button class=" bg-warning border-corner-round w-20">
    <a href="{{ route('applicant.jobs.index') }}">
        Back
</button>
                <!-- Share Job -->
                {{-- <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Share this Job</h3>
                    <div class="flex gap-3">
                        <button onclick="shareJob('twitter')" class="flex-1 bg-blue-400 text-white py-2 px-3 rounded-lg hover:bg-blue-500 transition-colors duration-200 text-sm">
                            Twitter
                        </button>
                        <button onclick="shareJob('linkedin')" class="flex-1 bg-blue-600 text-white py-2 px-3 rounded-lg hover:bg-blue-700 transition-colors duration-200 text-sm">
                            LinkedIn
                        </button>
                        <button onclick="copyJobLink()" class="flex-1 bg-gray-600 text-white py-2 px-3 rounded-lg hover:bg-gray-700 transition-colors duration-200 text-sm">
                            Copy Link
                        </button>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function shareJob(platform) {
        const jobTitle = "{{ $job->title }}";
        const jobUrl = window.location.href;
        const company = "{{ $job->company ?? 'Great Company' }}";

        let shareUrl = '';

        if (platform === 'twitter') {
            const text = `Check out this job opportunity: ${jobTitle} at ${company}`;
            shareUrl = `https://twitter.com/intent/tweet?text=${encodeURIComponent(text)}&url=${encodeURIComponent(jobUrl)}`;
        } else if (platform === 'linkedin') {
            shareUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(jobUrl)}`;
        }

        if (shareUrl) {
            window.open(shareUrl, '_blank', 'width=600,height=400');
        }
    }

    function copyJobLink() {
        const jobUrl = window.location.href;

        if (navigator.clipboard) {
            navigator.clipboard.writeText(jobUrl).then(() => {
                // Show success message
                const button = event.target;
                const originalText = button.textContent;
                button.textContent = 'Copied!';
                button.classList.add('bg-green-600');
                button.classList.remove('bg-gray-600');

                setTimeout(() => {
                    button.textContent = originalText;
                    button.classList.remove('bg-green-600');
                    button.classList.add('bg-gray-600');
                }, 2000);
            });
        }
    }
</script>
@endpush

@push('styles')
<style>
    @media print {
        .no-print {
            display: none !important;
        }
    }
</style>
@endpush
@endsection
</x-app-layout>
