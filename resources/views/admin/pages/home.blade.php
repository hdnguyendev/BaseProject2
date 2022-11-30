@extends('admin.layouts.layout')
@section('main_content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                <div class="row m-t-25">
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c1">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-account-o"></i>
                                    </div>
                                    <div class="text">
                                        <h2>{{ $total_clients }}</h2>
                                        <span>Clients</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart_clients"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c2">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-case-play"></i>
                                    </div>
                                    <div class="text">
                                        <h2>388,688</h2>
                                        <span>Movies</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart_movies"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c3">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-comments"></i>
                                    </div>
                                    <div class="text">
                                        <h2>{{ $total_comments }}</h2>
                                        <span>Reviews and comments</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart_comments"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c4">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-time-interval"></i>
                                    </div>
                                    <div class="text">
                                        <h2>{{ $total_views }}</h2>
                                        <span>Views</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart_views"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="au-card recent-report">
                            <div class="au-card-inner">
                                <h3 class="title-2">recent reports</h3>
                                <div class="chart-info">
                                    <div class="chart-info__left">
                                        <div class="chart-note">
                                            <span class="dot dot--blue"></span>
                                            <span>products</span>
                                        </div>
                                        <div class="chart-note mr-0">
                                            <span class="dot dot--green"></span>
                                            <span>services</span>
                                        </div>
                                    </div>
                                    <div class="chart-info__right">
                                        <div class="chart-statis">
                                            <span class="index incre">
                                                <i class="zmdi zmdi-long-arrow-up"></i>25%</span>
                                            <span class="label">products</span>
                                        </div>
                                        <div class="chart-statis mr-0">
                                            <span class="index decre">
                                                <i class="zmdi zmdi-long-arrow-down"></i>10%</span>
                                            <span class="label">services</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="recent-report__chart">
                                    <canvas id="recent-rep-chart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="au-card chart-percent-card">
                            <div class="au-card-inner">
                                <h3 class="title-2 tm-b-5">char by %</h3>
                                <div class="row no-gutters">
                                    <div class="col-xl-6">
                                        <div class="chart-note-wrap">
                                            <div class="chart-note mr-0 d-block">
                                                <span class="dot dot--blue"></span>
                                                <span>products</span>
                                            </div>
                                            <div class="chart-note mr-0 d-block">
                                                <span class="dot dot--red"></span>
                                                <span>services</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="percent-chart">
                                            <canvas id="percent-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection

@section('js')
    <script>
        (function($) {
            // USE STRICT
            "use strict";
            // Widget Clients
            try {
                var ctx = document.getElementById("widgetChart_clients");
                if (ctx) {
                    ctx.height = 130;
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                            type: 'line',
                            datasets: [{
                                data: [78, 81, 80, 45, 34, 12, 100],
                                label: 'Client',
                                backgroundColor: 'rgba(255,255,255,.1)',
                                borderColor: 'rgba(255,255,255,.55)',
                            }, ]
                        },
                        options: {
                            maintainAspectRatio: true,
                            legend: {
                                display: false
                            },
                            layout: {
                                padding: {
                                    left: 0,
                                    right: 0,
                                    top: 0,
                                    bottom: 0
                                }
                            },
                            responsive: true,
                            scales: {
                                xAxes: [{
                                    gridLines: {
                                        color: 'transparent',
                                        zeroLineColor: 'transparent'
                                    },
                                    ticks: {
                                        fontSize: 2,
                                        fontColor: 'transparent'
                                    }
                                }],
                                yAxes: [{
                                    display: false,
                                    ticks: {
                                        display: false,
                                    }
                                }]
                            },
                            title: {
                                display: false,
                            },
                            elements: {
                                line: {
                                    borderWidth: 0
                                },
                                point: {
                                    radius: 0,
                                    hitRadius: 10,
                                    hoverRadius: 4
                                }
                            }
                        }
                    });
                }
            } catch (error) {
                console.log(error);
            }
            // Widget Movies
            try {
                var ctx = document.getElementById("widgetChart_movies");
                if (ctx) {
                    ctx.height = 130;
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                            type: 'line',
                            datasets: [{
                                data: [1, 18, 9, 17, 34, 22],
                                label: 'Dataset',
                                backgroundColor: 'transparent',
                                borderColor: 'rgba(255,255,255,.55)',
                            }, ]
                        },
                        options: {

                            maintainAspectRatio: false,
                            legend: {
                                display: false
                            },
                            responsive: true,
                            tooltips: {
                                mode: 'index',
                                titleFontSize: 12,
                                titleFontColor: '#000',
                                bodyFontColor: '#000',
                                backgroundColor: '#fff',
                                titleFontFamily: 'Montserrat',
                                bodyFontFamily: 'Montserrat',
                                cornerRadius: 3,
                                intersect: false,
                            },
                            scales: {
                                xAxes: [{
                                    gridLines: {
                                        color: 'transparent',
                                        zeroLineColor: 'transparent'
                                    },
                                    ticks: {
                                        fontSize: 2,
                                        fontColor: 'transparent'
                                    }
                                }],
                                yAxes: [{
                                    display: false,
                                    ticks: {
                                        display: false,
                                    }
                                }]
                            },
                            title: {
                                display: false,
                            },
                            elements: {
                                line: {
                                    tension: 0.00001,
                                    borderWidth: 1
                                },
                                point: {
                                    radius: 4,
                                    hitRadius: 10,
                                    hoverRadius: 4
                                }
                            }
                        }
                    });
                }
            } catch (error) {
                console.log(error)
            }
            // Widget Comments
            try {
                var ctx = document.getElementById("widgetChart_comments");
                if (ctx) {
                    ctx.height = 130;
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                            type: 'line',
                            datasets: [{
                                data: [65, 59, 84, 84, 51, 55],
                                label: 'Dataset',
                                backgroundColor: 'transparent',
                                borderColor: 'rgba(255,255,255,.55)',
                            }, ]
                        },
                        options: {

                            maintainAspectRatio: false,
                            legend: {
                                display: false
                            },
                            responsive: true,
                            tooltips: {
                                mode: 'index',
                                titleFontSize: 12,
                                titleFontColor: '#000',
                                bodyFontColor: '#000',
                                backgroundColor: '#fff',
                                titleFontFamily: 'Montserrat',
                                bodyFontFamily: 'Montserrat',
                                cornerRadius: 3,
                                intersect: false,
                            },
                            scales: {
                                xAxes: [{
                                    gridLines: {
                                        color: 'transparent',
                                        zeroLineColor: 'transparent'
                                    },
                                    ticks: {
                                        fontSize: 2,
                                        fontColor: 'transparent'
                                    }
                                }],
                                yAxes: [{
                                    display: false,
                                    ticks: {
                                        display: false,
                                    }
                                }]
                            },
                            title: {
                                display: false,
                            },
                            elements: {
                                line: {
                                    borderWidth: 1
                                },
                                point: {
                                    radius: 4,
                                    hitRadius: 10,
                                    hoverRadius: 4
                                }
                            }
                        }
                    });
                }

            } catch (error) {
                console.log(error)
            }
            // Widget Views
            try {
                var ctx = document.getElementById("widgetChart_views");
                if (ctx) {
                    let labels = [];
                    let data = [];
                    @php
                        foreach ($data_views as $item){
                            echo 'labels.push(`'.$item->view_date.'`);';
                            echo 'data.push('.$item->total_views.');';
                        }

                    @endphp
                    ctx.height = 115;
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: "Views"   ,
                                data: data,
                                borderColor: "transparent",
                                borderWidth: "0",
                                backgroundColor: "rgba(255,255,255,.3)"
                            }]
                        },
                        options: {
                            maintainAspectRatio: true,
                            legend: {
                                display: false
                            },
                            scales: {
                                xAxes: [{
                                    display: false,
                                    categoryPercentage: 1,
                                    barPercentage: 0.65
                                }],
                                yAxes: [{
                                    display: false
                                }]
                            }
                        }
                    });
                }
            } catch (error) {
                console.log(error)
            }
        })(jQuery);
    </script>
@endsection
