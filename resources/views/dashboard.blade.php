@extends('layouts.master')

@section('title', 'Dashboard')
    
@section('content')

<div class="content-panel-responsive">
    <div class="row mt-3 ml-3 mb-3 mr-3">
        <div class="col-lg-9 main-chart">
            <!--CUSTOM CHART START -->
            <!--custom chart end-->
            <div class="row mt">
                <!-- SERVER STATUS PANELS -->
                <div class="col-md-6 col-sm-6 mb">
                    <div class="grey-panel pn donut-chart">
                        <div class="grey-header">
                            <h5>TOTAL PRODUCTS</h5>
                        </div>
                        <canvas id="serverstatus01" height="120" width="120"></canvas>
                        <script>
                            var doughnutData = [{
                                value: {{$products}},
                                color: "#FF6B6B"
                            },
                            {
                                value: 500,
                                color: "#fdfdfd"
                            }
                            ];
                            var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
                        </script>
                        <div class="row">
                            <div class="col-sm-6 col-xs-6 goleft">
                                <p>Usage<br />Increase:</p>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <h2>{{$products}} ITEMS</h2>
                            </div>
                        </div>
                    </div>
                    <!-- /grey-panel -->
                </div>
                <!-- /col-md-4-->
                <div class="col-md-6 col-sm-6 mb">
                    <div class="darkblue-panel pn">
                        <div class="darkblue-header">
                            <h5>STOCK STATISTICS</h5>
                        </div>
                        <canvas id="serverstatus02" height="120" width="120"></canvas>
                        <script>
                            var doughnutData = [{
                                value: {{$stock}},
                                color: "#1c9ca7"
                            },
                            {
                                value: 5000,
                                color: "#f68275"
                            }
                            ];
                            var myDoughnut = new Chart(document.getElementById("serverstatus02").getContext("2d")).Doughnut(doughnutData);
                        </script>
                        <p>{{$time}}</p>
                        <footer>
                            <div class="pull-left">
                                @if($nostock = 1)
                                <h5> {{$nostock}} Item/s has no stock</h5>
                                @endif
                            </div>
                            <div class="pull-right">
                                <h5>{{$quantity}} Item is Low on Stock</h5>
                            </div>
                        </footer>
                    </div>
                    <!--  /darkblue panel -->
                </div>
                <!-- /col-md-4 -->
                <!-- /col-md-4 -->
            </div>
            <!-- /row -->
            <div class="row">
                <div class="col-md-12 col-sm-12 mb">
                    <!-- REVENUE PANEL -->
                    <div class="green-panel pn">
                        <div class="green-header">
                            <h5>REVENUE</h5>
                        </div>
                        <div class="chart mt">
                            <div class="sparkline" data-type="line" data-resize="true" data-height="75"
                                data-width="90%" data-line-width="1" data-line-color="#fff"
                                data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff"
                                data-spot-radius="4"
                                data-data="[{{$jan}},{{$feb}},{{$mar}},{{$apr}},{{$may}},{{$jun}},{{$jul}},{{$aug}},{{$sep}},{{$oct}},{{$nov}},{{$dec}}]"></div>
                        </div>
                        <p class="mt"><b>&#8369; {{number_format($income, 2, '.', ',')}}</b><br />Income this Month</p>
                    </div>
                </div>
                <!-- WEATHER PANEL -->
                <!-- /col-md-8  -->
            </div>
            <!-- /row -->
        </div>
        <!-- /col-lg-9 END SECTION MIDDLE -->
        <!-- **********************************************************************************************************************************************************
    RIGHT SIDEBAR CONTENT
    *********************************************************************************************************************************************************** -->
        <div class="col-lg-3 ds">
            <!--COMPLETED ACTIONS DONUTS CHART-->
            <div class="donut-main">
                <h4>COMPLETED ACTIONS & PROGRESS</h4>
                <canvas id="newchart" height="130" width="130"></canvas>
                <script>
                    var doughnutData = [{
                        value: {{$today}},
                        color: "#4ECDC4"
                    },
                    {
                        value: {{$yesterday}},
                        color: "#f68275"
                    }
                    ];
                    var myDoughnut = new Chart(document.getElementById("newchart").getContext("2d")).Doughnut(doughnutData);
                </script>
            </div>
            <!--NEW EARNING STATS -->
            <div class="panel terques-chart">
                <div class="panel-body">
                    <div class="chart">
                        <div class="centered">
                            <span>EARNINGS YESTERDAY</span>
                            <strong> &#8369;{{number_format($yesterday, 2, '.', ',')}}</strong>
                        </div>
                        <div class="centered">
                            <span>EARNINGS TODAY</span>
                            <strong> &#8369;{{number_format($today, 2, '.', ',')}} | {{$percent}}%</strong>
                        </div>
                        <br>
                        <div class="sparkline" data-type="line" data-resize="true" data-height="75"
                            data-width="90%" data-line-width="1" data-line-color="#fff"
                            data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff"
                            data-spot-radius="4" data-data="[{{$yesterday}},{{$today}}]">
                        </div>
                    </div>
                </div>
            </div>
            <!--new earning end-->
            <!-- RECENT ACTIVITIES SECTION -->
            <h4 class="centered mt">RECENT ACTIVITY</h4>
            <!-- First Activity -->
            <div class="desc">
                <div class="thumb">
                    <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                </div>
                <div class="details">
                    <p>
                        <muted>Just Now</muted>
                        <br />
                        <a href="#">Paul Rudd</a> purchased an item.<br />
                    </p>
                </div>
            </div>
            <!-- Second Activity -->
            <div class="desc">
                <div class="thumb">
                    <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                </div>
                <div class="details">
                    <p>
                        <muted>2 Minutes Ago</muted>
                        <br />
                        <a href="#">James Brown</a> subscribed to your newsletter.<br />
                    </p>
                </div>
            </div>
            <!-- Third Activity -->
            <div class="desc">
                <div class="thumb">
                    <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                </div>
                <div class="details">
                    <p>
                        <muted>3 Hours Ago</muted>
                        <br />
                        <a href="#">Diana Kennedy</a> purchased a year subscription.<br />
                    </p>
                </div>
            </div>
            <!-- Fourth Activity -->
            <div class="desc">
                <div class="thumb">
                    <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                </div>
                <div class="details">
                    <p>
                        <muted>7 Hours Ago</muted>
                        <br />
                        <a href="#">Brando Page</a> purchased a year subscription.<br />
                    </p>
                </div>
            </div>
            <!-- USERS ONLINE SECTION -->
            <!-- / calendar -->
        </div>
        <!-- /col-lg-3 -->
    </div>
</div>
@endsection