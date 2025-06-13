<x-app-layout>
@extends('layouts.applicant')


@section('title', 'Apply for ' . $job->title)

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 py-8" style="margin-top: -40rem;">
    <div class="container mx-auto px-4">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('applicant.jobs.show', $job->id) }}"
               class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Job Details
            </a>
        </div>

        <div class="max-w-4xl mx-auto">
            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Job Summary Card -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 sticky top-8">
                        <div class="text-center mb-6">
                            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2h8zM8 14v.01M16 14v.01"></path>
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $job->title }}</h2>
                        </div>

                        <div class="space-y-4">
                            @if($job->discription)
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H9m0 0H5m4 0v-5a1 1 0 011-1h4a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                    <span class="font-medium">{{ $job->description }}</span>
                                </div>
                            @endif

                            @if($job->location)
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span>{{ $job->location }}</span>
                                </div>
                            @endif

                            @if($job->job_type)
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>{{ $job->job_type }}</span>
                                </div>
                            @endif

                            @if($job->salary)
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                    </svg>
                                    <span>{{ $job->salary }}</span>
                                </div>
                            @endif
                        </div>

                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <p class="text-sm text-gray-500 text-center">
                                Posted {{ $job->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Application Form -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <!-- Form Header -->
                        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-6">
                            <h1 class="text-2xl font-bold text-white mb-2">Submit Your Application</h1>
                            <p class="text-blue-100">Tell us why you're the perfect fit for this role</p>
                        </div>

                        <!-- Form Content -->
                        <div class="p-8">
                            <!-- Error Messages -->
                            @if ($errors->any())
                                <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
                                    <div class="flex items-center mb-2">
                                        <svg class="w-5 h-5 text-red-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <h3 class="text-red-800 font-medium">Please fix the following errors:</h3>
                                    </div>
                                    <ul class="list-disc list-inside text-red-700 text-sm space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('applicant.jobs.apply', $job->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                                @csrf

                                <!-- Cover Letter -->
                                <div>
                                    <label for="cover_letter" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Cover Letter <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <textarea
                                            id="cover_letter"
                                            name="cover_letter"
                                            rows="8"
                                            placeholder="Write a compelling cover letter explaining why you're interested in this position and what makes you a great candidate..."
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('cover_letter') border-red-300 focus:ring-red-500 @enderror"
                                            required
                                        >{{ old('cover_letter') }}</textarea>
                                        <div class="absolute bottom-3 right-3 text-xs text-gray-400">
                                            <span id="char-count">0</span> characters
                                        </div>
                                    </div>
                                    @error('cover_letter')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    <p class="mt-2 text-sm text-gray-500">
                                        💡 <strong>Tip:</strong> Mention specific skills and experiences that relate to this job posting.
                                    </p>
                                </div>

                                <!-- Resume Upload -->
                                <div>
                                    <label for="resume" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Resume/CV <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="flex items-center justify-center w-full">
                                            <label for="resume" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors duration-200 @error('resume') border-red-300 bg-red-50 @enderror">
                                                <div class="flex flex-col items-center justify-center pt-5 pb-6" id="upload-text">
                                                    <svg class="w-8 h-8 mb-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                                    </svg>
                                                    <p class="mb-2 text-sm text-gray-500">
                                                        <span class="font-semibold">Click to upload</span> or drag and drop
                                                    </p>
                                                    <p class="text-xs text-gray-500">PDF, DOC, or DOCX (MAX. 2MB)</p>
                                                </div>
                                                <input id="resume" name="resume" type="file" class="hidden" accept=".pdf,.doc,.docx" required />
                                            </label>
                                        </div>
                                    </div>
                                    @error('resume')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    <p class="mt-2 text-sm text-gray-500">
                                        📄 <strong>Accepted formats:</strong> PDF, DOC, DOCX files up to 2MB
                                    </p>
                                </div>

                                <!-- Application Guidelines -->
                                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                                    <h4 class="font-semibold text-blue-800 mb-2">Application Guidelines</h4>
                                    <ul class="text-sm text-blue-700 space-y-1">
                                        <li>• Make sure your resume is up-to-date and relevant</li>
                                        <li>• Customize your cover letter for this specific position</li>
                                        <li>• Double-check all information before submitting</li>
                                        <li>• You'll receive a confirmation email after submission</li>
                                    </ul>
                                </div>

                                <!-- Submit Button -->
                                <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                                    <a href="{{ route('applicant.jobs.index') }}"
                                       class="px-6 py-3 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors duration-200 font-medium">
                                        Cancel
                                    </a>
                                    <button
                                        type="submit"
                                        class="px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5"
                                    >
                                        Submit Application
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Character counter for cover letter
    const textarea = document.getElementById('cover_letter');
    const charCount = document.getElementById('char-count');

    function updateCharCount() {
        const count = textarea.value.length;
        charCount.textContent = count.toLocaleString();

        if (count > 1000) {
            charCount.classList.add('text-orange-500');
        } else {
            charCount.classList.remove('text-orange-500');
        }
    }

    textarea.addEventListener('input', updateCharCount);
    updateCharCount(); // Initial count

    // File upload handling
    const fileInput = document.getElementById('resume');
    const uploadText = document.getElementById('upload-text');

    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const fileName = file.name;
            const fileSize = (file.size / 1024 / 1024).toFixed(2); // Convert to MB

            uploadText.innerHTML = `
                <svg class="w-8 h-8 mb-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="mb-2 text-sm text-gray-700">
                    <span class="font-semibold">${fileName}</span>
                </p>
                <p class="text-xs text-gray-500">${fileSize} MB</p>
            `;

            // Change border color to green
            fileInput.closest('label').classList.remove('border-gray-300', 'bg-gray-50');
            fileInput.closest('label').classList.add('border-green-300', 'bg-green-50');
        }
    });

    // Form submission loading state
    const form = document.querySelector('form');
    const submitButton = form.querySelector('button[type="submit"]');
    const originalButtonText = submitButton.innerHTML;

    form.addEventListener('submit', function() {
        submitButton.disabled = true;
        submitButton.innerHTML = `
            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Submitting Application...
        `;
    });
</script>
@endpush
@endsection
</x-app-layout>
