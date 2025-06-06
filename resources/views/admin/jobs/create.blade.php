<x-app-layout>
@extends('layouts.admin')

@section('header', 'Post New Job')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <form action="{{ route('admin.jobs.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Job Title</label>
            <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('title') }}" required>
            @error('title')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Job Description</label>
            <textarea name="description" id="description" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ old('description') }}</textarea>
            @error('description')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location</label>
                <input type="text" name="location" id="location" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('location') }}" required>
                @error('location')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="job_type" class="block text-gray-700 text-sm font-bold mb-2">Job Type</label>
                <select name="job_type" id="job_type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="">Select job type</option>
                    <option value="Full-time" {{ old('job_type') == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                    <option value="Part-time" {{ old('job_type') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                    <option value="Contract" {{ old('job_type') == 'Contract' ? 'selected' : '' }}>Contract</option>
                    <option value="Internship" {{ old('job_type') == 'Internship' ? 'selected' : '' }}>Internship</option>
                </select>
                @error('job_type')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="salary" class="block text-gray-700 text-sm font-bold mb-2">Salary (Optional)</label>
            <input type="number" name="salary" id="salary" step="0.01" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('salary') }}">
            @error('salary')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="requirements" class="block text-gray-700 text-sm font-bold mb-2">Requirements</label>
            <textarea name="requirements" id="requirements" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('requirements') }}</textarea>
            @error('requirements')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="responsibilities" class="block text-gray-700 text-sm font-bold mb-2">Responsibilities</label>
            <textarea name="responsibilities" id="responsibilities" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('responsibilities') }}</textarea>
            @error('responsibilities')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
             <a href="{{ route('admin.jobs.index') }}" class="text-gray-600 hover:text-gray-800 bg-danger-100 hover:bg-danger-200 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" style="background:red; color:white;">
                Cancel
            </a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Post Job
            </button>

        </div>
    </form>
</div>
@endsection
</x-app-layout>
