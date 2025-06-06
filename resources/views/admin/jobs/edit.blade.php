<x-app-layout>
@extends('layouts.admin')

@section('header', 'Edit Job')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <form action="{{ route('admin.jobs.update', $job) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Job Title</label>
            <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('title', $job->title) }}" required>
            @error('title')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Job Description</label>
            <textarea name="description" id="description" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ old('description', $job->description) }}</textarea>
            @error('description')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location</label>
                <input type="text" name="location" id="location" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('location', $job->location) }}" required>
                @error('location')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Job Type</label>
                <select name="type" id="type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="">Select job type</option>
                    <option value="Full-time" {{ old('type', $job->type) == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                    <option value="Part-time" {{ old('type', $job->type) == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                    <option value="Contract" {{ old('type', $job->type) == 'Contract' ? 'selected' : '' }}>Contract</option>
                    <option value="Internship" {{ old('type', $job->type) == 'Internship' ? 'selected' : '' }}>Internship</option>
                </select>
                @error('type')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="salary" class="block text-gray-700 text-sm font-bold mb-2">Salary (Optional)</label>
            <input type="number" name="salary" id="salary" step="0.01" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('salary', $job->salary) }}">
            @error('salary')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="requirements" class="block text-gray-700 text-sm font-bold mb-2">Requirements</label>
            <textarea name="requirements" id="requirements" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('requirements', $job->requirements) }}</textarea>
            @error('requirements')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="responsibilities" class="block text-gray-700 text-sm font-bold mb-2">Responsibilities</label>
            <textarea name="responsibilities" id="responsibilities" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('responsibilities', $job->responsibilities) }}</textarea>
            @error('responsibilities')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="flex items-center">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $job->is_active) ? 'checked' : '' }} class="form-checkbox h-5 w-5 text-blue-600">
                <span class="ml-2 text-gray-700">Active</span>
            </label>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Update Job
            </button>
            <a href="{{ route('admin.jobs.index') }}" class="text-gray-600 hover:text-gray-800">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
</x-app-layout>
