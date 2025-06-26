
<x-app-layout>
@extends('layouts.admin')
    <!-- Header Slot -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<!-- begin app -->
<div class="app">
    <!-- begin app-wrap -->
    <div class="app-wrap">
        <!-- begin pre-loader -->
        <div class="loader">
            <div class="h-100 d-flex justify-content-center">
                <div class="align-self-center">
                    <img src="../assets/img/loader/loader.svg" alt="loader">
                </div>
            </div>
        </div>
        <!-- end pre-loader -->

    <!-- Page Content -->
    <div class="py-6" style="margin-left: 16rem;">
        <div class="container-fluid">
            <!-- Page Title and Breadcrumb -->
            <div class="row">
                <div class="col-md-12 m-b-30">
                    <div class="d-block d-sm-flex flex-nowrap align-items-center">
                        <div class="page-title mb-2 mb-sm-0">
                            {{-- <h1><i class="fa fa-dashboard"></i> Dashboard</h1> --}}
                        </div>
                        <div class="ml-auto d-flex align-items-center">
                            <nav>
                                <ol class="breadcrumb p-0 m-b-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active text-primary" aria-current="page">Home</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Statistics Cards -->
            <div class="row">
                <div class="col-xxl-3 col-lg-6">
                    <div class="p-20 border-lg-right border-bottom border-xxl-bottom-0 card card-statistics">
                        <div class="d-flex m-b-10">
                            <p class="mb-0 font-regular text-muted font-weight-bold">Number of Applications</p>
                            <a class="mb-0 ml-auto font-weight-bold" href="#"><i class="ti ti-more-alt"></i></a>
                        </div>
                        <div class="d-block d-sm-flex h-100 align-items-center">
                            <div class="apexchart-wrapper">
                                <div id="analytics7"></div>
                            </div>
                            <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
                                <h3 class="mb-0"><i class="icon-arrow-up-circle"></i> {{ $tourStats['total_tours'] }}</h3>
                                <p>Jobs</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-lg-6">
                    <div class="p-20 border-xxl-right border-bottom border-xxl-bottom-0 card card-statistics">
                        <div class="d-flex m-b-10">
                            <p class="mb-0 font-regular text-muted font-weight-bold">Number of Active Jobs</p>
                            <a class="mb-0 ml-auto font-weight-bold" href="#"><i class="ti ti-more-alt"></i></a>
                        </div>
                        <div class="d-block d-sm-flex h-100 align-items-center">
                            <div class="apexchart-wrapper">
                                <div id="analytics8"></div>
                            </div>
                            <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
                                <h3 class="mb-0"><i class="icon-arrow-up-circle"></i> {{ $tourStats['live_visitors'] }}</h3>
                                <p>Live now</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-lg-6">
                    <div class="p-20 border-lg-right border-bottom border-lg-bottom-0 card card-statistics">
                        <div class="d-flex m-b-10">
                            <p class="mb-0 font-regular text-muted font-weight-bold">Total Applications</p>
                            <a class="mb-0 ml-auto font-weight-bold" href="#"><i class="ti ti-more-alt"></i></a>
                        </div>
                        <div class="d-block d-sm-flex h-100 align-items-center">
                            <div class="apexchart-wrapper">
                                <div id="analytics9"></div>
                            </div>
                            <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
                                <h3 class="mb-0"><i class="icon-arrow-up-circle"></i> {{ $tourStats['total_visitors'] }}</h3>
                                <p>Total</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-lg-3">
                    <div class="p-20 card card-statistics">
                        <div class="d-block d-sm-flex h-100 align-items-center">
                            <div class="apexchart-wrapper">
                                <div id="analytics10"></div>
                            </div>
                            <div class="statistics ml-sm-auto mt-4 mt-sm-0 pr-sm-5">
                                <ul class="list-style-none p-0">
                                    <li class="d-flex py-1">
                                        <span><i class="fa fa-circle text-primary pr-2"></i> Musics</span>
                                        <span class="pl-2 font-weight-bold">{{ $tourStats['activity_stats']['musics'] }}</span>
                                    </li>
                                    {{-- <li class="d-flex py-1">
                                        <span><i class="fa fa-circle text-warning pr-2"></i> Comment</span>
                                        <span class="pl-2 font-weight-bold">{{ $tourStats['activity_stats']['comments'] }}</span>
                                    </li> --}}
                                    <li class="d-flex py-1">
                                        <span><i class="fa fa-circle text-info pr-2"></i> Gallery</span>
                                        <span class="pl-2 font-weight-bold">{{ $tourStats['activity_stats']['gallery'] }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chart Section -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-statistics">
                        <div class="card-header">
                            <div class="card-heading">
                                <h4 class="card-title">Visitor Statistics by Tour</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="bargraph" height="210"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card card-statistics">
                        <div class="card-header">
                            <div class="card-heading">
                                <h4 class="card-title">Visitor Statistics</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="line" height="210"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Scripts -->

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var chartData = {
                labels: {!! json_encode($chartData['labels']) !!},
                datasets: [{
                    label: 'Visitors',
                    backgroundColor: 'rgb(79,129,189)',
                    borderColor: 'rgba(0, 158, 251, 1)',
                    borderWidth: 1,
                    data: {!! json_encode($chartData['visitors']) !!}
                }]
            };

            var ctx = document.getElementById('bargraph').getContext('2d');
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: chartData,
                options: {
                    responsive: true,
                    legend: {
                        display: false,
                    }
                }
            });

            var ctxLine = document.getElementById('line').getContext('2d');
            window.myLine = new Chart(ctxLine, {
                type: 'line',
                data: chartData,
                options: {
                    responsive: true,
                    legend: {
                        display: false,
                    }
                }
            });
        });
    </script>

</x-app-layout>
