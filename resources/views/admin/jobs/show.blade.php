<x-app-layout>
@extends('layouts.admin')

@section('header', 'Job Details')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-semibold mb-4 text-gray-800">{{ $job->title }}</h2>

    <div class="mb-4">
        <strong class="block text-gray-700">Description:</strong>
        <p class="text-gray-800">{{ $job->description }}</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div>
            <strong class="block text-gray-700">Location:</strong>
            <p class="text-gray-800">{{ $job->location }}</p>
        </div>

        <div>
            <strong class="block text-gray-700">Job Type:</strong>
            <p class="text-gray-800">{{ $job->job_type }}</p>
        </div>
    </div>

    <div class="mb-4">
        <strong class="block text-gray-700">Salary:</strong>
        <p class="text-gray-800">{{ $job->salary ? 'GHS ' . number_format($job->salary, 2) : 'Not specified' }}</p>
    </div>

    <div class="mb-4">
        <strong class="block text-gray-700">Requirements:</strong>
        <p class="text-gray-800 whitespace-pre-line">{{ $job->requirements }}</p>
    </div>

    <div class="mb-4">
        <strong class="block text-gray-700">Responsibilities:</strong>
        <p class="text-gray-800 whitespace-pre-line">{{ $job->responsibilities }}</p>
    </div>

    <div class="flex justify-end">
        <a href="{{ route('admin.jobs.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Back to Jobs
        </a>
    </div>
</div>
@endsection
</x-app-layout>
