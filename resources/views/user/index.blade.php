@extends('layouts.user')

@section('title', 'Dashboard')

@section('content')
<div class="main-container">
    <div class="pd-ltr-20">
        <div class="row">
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <i class="icon-copy fa fa-check-circle fa-3x" aria-hidden="true" style="color: green;"></i>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0">{{ $users }}</div>
                            <div class="weight-600 font-14"> Total Booking</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <i class="icon-copy fa fa-drivers-license fa-3x" aria-hidden="true" style="color: blue;"></i>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0">{{ $driver }}</div>
                            <div class="weight-600 font-14">Drivers</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <i class="icon-copy fa fa-car fa-3x" aria-hidden="true" style="color: red;"></i>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0">{{ $passenger }}</div>
                            <div class="weight-600 font-14">Passenger Vehicle</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <i class="icon-copy fa fa-truck fa-3x" aria-hidden="true" style="color: yellow;"></i>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0">{{ $cargo }}</div>
                            <div class="weight-600 font-14">Cargo Vehicle</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8 mb-30">
                <div class="card-box height-100-p pd-20">
                    <h2 class="h4 mb-20">Activity</h2>
                    <canvas id="myChart2"></canvas>
                </div>
            </div>
            <div class="col-xl-4 mb-30">
                <div class="card-box height-100-p pd-20">
                    <h2 class="h4 mb-20">Vehicle Usage</h2>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
            TrackWheels - 2024
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById('myChart').getContext('2d');


        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Passenger', 'Cargo'],
                datasets: [{
                    data: [<?php echo $passenger; ?>, <?php echo $cargo; ?>],
                    backgroundColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)'],
                    borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)'],
                    borderWidth: 1
                }]
            },
            options: {}
        });

    });

    document.addEventListener("DOMContentLoaded", function() {
        var labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var passengerData = [20, 30, 25, 35, 40, 50, 45, 55, 60, 70, 65, 75];
        var cargoData = [10, 15, 12, 18, 20, 25, 22, 28, 30, 35, 32, 38];

        var ctx = document.getElementById('myChart2').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Passenger',
                    data: passengerData,
                    backgroundColor: 'rgba(255, 99, 132, 1)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }, {
                    label: 'Cargo',
                    data: cargoData,
                    backgroundColor: 'rgba(54, 162, 235, 1)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endsection