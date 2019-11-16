@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
        </div>
    </div>

    <canvas class="my-4" id="myChart" width="900" height="380"></canvas>

@endsection

@section('js')
    @parent

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>

        $(function () {

            var data =<?php echo json_encode($data); ?>;
                console.log(data);
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday","Sunday"],
                    datasets: [{
                        data: data,
                        lineTension: 0,
                        backgroundColor: 'transparent',
                        borderColor: '#007bff',
                        borderWidth: 4,
                        pointBackgroundColor: '#007bff'
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    legend: {
                        display: false,
                    },title: {
                        display: true,
                        text: 'Bids this week'
                    }
                }
            });
        });
    </script>
@endsection
