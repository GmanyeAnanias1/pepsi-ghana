<x-app-layout>
@extends('layouts.admin')
  <!-- Header Slot -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-left: 12rem;">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


<!-- Dashboard Content -->
    <!-- Total Jobs -->
   <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-6" style="margin-left: 20rem; max-width: 1150px;">
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

<!-- Chart Section -->
<!-- Applications per Month Bar Chart -->
<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Charts Row -->
<div class="flex flex-col lg:flex-row gap-6 justify-center mt-8 px-4" style="max-width: 1150px; margin-left: 20rem;">

    <!-- Bar Chart Card -->
    <div class="bg-white dark:bg-gray-800 rounded-md shadow p-6 w-full lg:w-2/3">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Applications Per Month</h2>
        <canvas id="applicationsChart" height="150"></canvas>
    </div>

    <!-- Pie Chart Card -->
    <div class="bg-white dark:bg-gray-800 rounded-md shadow p-6 w-full lg:w-1/3">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Application Status Summary</h2>
        <div class="flex justify-center">
            <canvas id="statusPieChart" width="250" height="250"></canvas>
        </div>
    </div>
</div>

<!-- Chart Scripts -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Bar Chart
        const ctx = document.getElementById('applicationsChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($months),
                datasets: [{
                    label: 'Applications',
                    data: @json($counts),
                    backgroundColor: 'rgba(59, 130, 246, 0.7)',
                    borderColor: 'rgba(59, 130, 246, 1)',
                    borderWidth: 1,
                    borderRadius: 6,
                    maxBarThickness: 20
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 0.5,
                            color: 'rgba(55, 65, 81, 1)'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Pie Chart
        const ctxPie = document.getElementById('statusPieChart').getContext('2d');
        new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: ['Interviewed', 'Approved', 'Rejected'],
                datasets: [{
                    data: [{{ $interviewed }}, {{ $approved }}, {{ $rejected }}],
                    backgroundColor: [
                        'rgba(59, 130, 246, 0.7)',
                        'rgba(34, 197, 94, 0.7)',
                        'rgba(239, 68, 68, 0.7)'
                    ],
                    borderColor: [
                        'rgba(59, 130, 246, 1)',
                        'rgba(34, 197, 94, 1)',
                        'rgba(239, 68, 68, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: '#4B5563'
                        }
                    }
                }
            }
        });
    });
</script>



</x-app-layout>

