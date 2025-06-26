<x-app-layout>
@extends('layouts.admin')
  <!-- Header Slot -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-left: 12rem;">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4  mx-auto mt-6" style="max-width: 70rem; margin-left: 20rem;">
    <!-- Total Jobs -->
    <div class="bg-white dark:bg-gray-800 rounded-md shadow p-4 flex justify-between items-center">
        <div>
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Total Jobs</p>
            <h4 class="text-xl font-semibold text-gray-800 dark:text-white">{{ $jobs->count() }}</h4>
            <span class="text-xs text-green-600 inline-flex items-center mt-1">
                <i class="fas fa-briefcase mr-1"></i> Active Posting
            </span>
        </div>
        <i class="fas fa-briefcase fa-2x text-green-500"></i>
    </div>

    <!-- Active Jobs -->
    <div class="bg-white dark:bg-gray-800 rounded-md shadow p-4 flex justify-between items-center">
        <div>
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Active Jobs</p>
            <h4 class="text-xl font-semibold text-gray-800 dark:text-white">{{ $is_active }}</h4>
            <span class="text-xs text-blue-600 inline-flex items-center mt-1">
                <i class="fas fa-check-circle mr-1"></i> Verified
            </span>
        </div>
        <i class="fas fa-check-circle fa-2x text-blue-500"></i>
    </div>

    <!-- Inactive Jobs -->
    <div class="bg-white dark:bg-gray-800 rounded-md shadow p-4 flex justify-between items-center">
        <div>
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Inactive Jobs</p>
            <h4 class="text-xl font-semibold text-gray-800 dark:text-white">{{ $is_inactive }}</h4>
            <span class="text-xs text-red-600 inline-flex items-center mt-1">
                <i class="fas fa-times-circle mr-1"></i> Closed
            </span>
        </div>
        <i class="fas fa-times-circle fa-2x text-red-500"></i>
    </div>

    <!-- Total Applications -->
    <div class="bg-white dark:bg-gray-800 rounded-md shadow p-4 flex justify-between items-center">
        <div>
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Applications</p>
            <h4 class="text-xl font-semibold text-gray-800 dark:text-white">{{ $applicaions }}</h4>
            <span class="text-xs text-cyan-600 inline-flex items-center mt-1">
                <i class="fas fa-file-alt mr-1"></i> Submissions
            </span>
        </div>
        <i class="fas fa-file-alt fa-2x text-cyan-500"></i>
    </div>
</div>

</x-app-layout>

