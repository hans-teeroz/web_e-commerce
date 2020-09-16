@extends('admin::layouts.master')

@section('content')

    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$numTran}}</h3>

                        <p>New Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('admin.get.list.transaction')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>53<sup style="font-size: 20px">%</sup></h3>

                        <p>Bounce Rate</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{$numUser}}</h3>

                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('admin.get.list.user')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>65</h3>

                        <p>Unique Visitors</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                <div class="box">--}}
{{--                    <div class="box-header with-border">--}}
{{--                        <h3 class="box-title">Monthly Recap Report</h3>--}}

{{--                        <div class="box-tools pull-right">--}}
{{--                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>--}}
{{--                            </button>--}}
{{--                            <div class="btn-group">--}}
{{--                                <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">--}}
{{--                                    <i class="fa fa-wrench"></i></button>--}}
{{--                                <ul class="dropdown-menu" role="menu">--}}
{{--                                    <li><a href="#">Action</a></li>--}}
{{--                                    <li><a href="#">Another action</a></li>--}}
{{--                                    <li><a href="#">Something else here</a></li>--}}
{{--                                    <li class="divider"></li>--}}
{{--                                    <li><a href="#">Separated link</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- /.box-header -->--}}
{{--                    <div class="box-body">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-8">--}}
{{--                                <p class="text-center">--}}
{{--                                    <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>--}}
{{--                                </p>--}}

{{--                                <div class="chart">--}}
{{--                                    <!-- Sales Chart Canvas -->--}}
{{--                                    <canvas id="salesChart" style="height: 180px; width: 816px;" width="1020" height="225"></canvas>--}}
{{--                                </div>--}}
{{--                                <!-- /.chart-responsive -->--}}
{{--                            </div>--}}
{{--                            <!-- /.col -->--}}
{{--                            <div class="col-md-4">--}}
{{--                                <p class="text-center">--}}
{{--                                    <strong>Goal Completion</strong>--}}
{{--                                </p>--}}

{{--                                <div class="progress-group">--}}
{{--                                    <span class="progress-text">Add Products to Cart</span>--}}
{{--                                    <span class="progress-number"><b>160</b>/200</span>--}}

{{--                                    <div class="progress sm">--}}
{{--                                        <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- /.progress-group -->--}}
{{--                                <div class="progress-group">--}}
{{--                                    <span class="progress-text">Complete Purchase</span>--}}
{{--                                    <span class="progress-number"><b>310</b>/400</span>--}}

{{--                                    <div class="progress sm">--}}
{{--                                        <div class="progress-bar progress-bar-red" style="width: 80%"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- /.progress-group -->--}}
{{--                                <div class="progress-group">--}}
{{--                                    <span class="progress-text">Visit Premium Page</span>--}}
{{--                                    <span class="progress-number"><b>480</b>/800</span>--}}

{{--                                    <div class="progress sm">--}}
{{--                                        <div class="progress-bar progress-bar-green" style="width: 80%"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- /.progress-group -->--}}
{{--                                <div class="progress-group">--}}
{{--                                    <span class="progress-text">Send Inquiries</span>--}}
{{--                                    <span class="progress-number"><b>250</b>/500</span>--}}

{{--                                    <div class="progress sm">--}}
{{--                                        <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- /.progress-group -->--}}
{{--                            </div>--}}
{{--                            <!-- /.col -->--}}
{{--                        </div>--}}
{{--                        <!-- /.row -->--}}
{{--                    </div>--}}
{{--                    <!-- ./box-body -->--}}
{{--                    <div class="box-footer">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-sm-3 col-xs-6">--}}
{{--                                <div class="description-block border-right">--}}
{{--                                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>--}}
{{--                                    <h5 class="description-header">$35,210.43</h5>--}}
{{--                                    <span class="description-text">TOTAL REVENUE</span>--}}
{{--                                </div>--}}
{{--                                <!-- /.description-block -->--}}
{{--                            </div>--}}
{{--                            <!-- /.col -->--}}
{{--                            <div class="col-sm-3 col-xs-6">--}}
{{--                                <div class="description-block border-right">--}}
{{--                                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>--}}
{{--                                    <h5 class="description-header">$10,390.90</h5>--}}
{{--                                    <span class="description-text">TOTAL COST</span>--}}
{{--                                </div>--}}
{{--                                <!-- /.description-block -->--}}
{{--                            </div>--}}
{{--                            <!-- /.col -->--}}
{{--                            <div class="col-sm-3 col-xs-6">--}}
{{--                                <div class="description-block border-right">--}}
{{--                                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>--}}
{{--                                    <h5 class="description-header">$24,813.53</h5>--}}
{{--                                    <span class="description-text">TOTAL PROFIT</span>--}}
{{--                                </div>--}}
{{--                                <!-- /.description-block -->--}}
{{--                            </div>--}}
{{--                            <!-- /.col -->--}}
{{--                            <div class="col-sm-3 col-xs-6">--}}
{{--                                <div class="description-block">--}}
{{--                                    <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>--}}
{{--                                    <h5 class="description-header">1200</h5>--}}
{{--                                    <span class="description-text">GOAL COMPLETIONS</span>--}}
{{--                                </div>--}}
{{--                                <!-- /.description-block -->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- /.row -->--}}
{{--                    </div>--}}
{{--                    <!-- /.box-footer -->--}}
{{--                </div>--}}
{{--                <!-- /.box -->--}}
{{--            </div>--}}
{{--            <!-- /.col -->--}}
{{--        </div>--}}
        <!-- Main row -->
        <ul class="nav nav-pills ranges">
            <li class="active"><a href="#" data-range='7'>7 Days</a></li>
            <li><a href="#" data-range='30'>30 Days</a></li>
            <li><a href="#" data-range='60'>60 Days</a></li>
            <li><a href="#" data-range='90'>90 Days</a></li>
        </ul>
        <div id="stats-container" style="height: 250px;"></div>

        @if(isset($productBuy))
            <div id="container" data-order="{{ $productBuy }}"></div>
        @else
            <div id="container" data-order="{{ $orderYear }}"></div>
        @endif

        <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">

            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">

            </section>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
@stop
@section('script')
    @if(isset($productBuy))
        <script>
            $(document).ready(function(){
                var productBuy = $('#container').data('order');
                var chartData = [];
                productBuy.forEach(function(element){
                    var ele = {name : element.name, y : parseFloat(element.y) };
                    chartData.push(ele);
                });
                console.log(chartData);
                Highcharts.chart('container', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: 'Daily order'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: false
                            },
                            showInLegend: true
                        }
                    },
                    series: [{
                        name: 'Brands',
                        colorByPoint: true,
                        data: chartData,
                    }]
                });
            });
        </script>
    @else
        <script>
            $(document).ready(function(){
                var order = $('#container').data('order');
                var listOfValue = [];
                var listOfYear = [];
                order.forEach(function(element){
                    listOfYear.push(element.getYear);
                    listOfValue.push(element.value);
                });
                console.log(listOfValue);
                var chart = Highcharts.chart('container', {

                    title: {
                        text: 'Orders by years'
                    },

                    subtitle: {
                        text: 'Plain'
                    },

                    xAxis: {
                        categories: listOfYear,
                    },

                    series: [{
                        type: 'column',
                        colorByPoint: true,
                        data: listOfValue,
                        showInLegend: false
                    }]
                });

                $('#plain').click(function () {
                    chart.update({
                        chart: {
                            inverted: false,
                            polar: false
                        },
                        subtitle: {
                            text: 'Plain'
                        }
                    });
                });

                $('#inverted').click(function () {
                    chart.update({
                        chart: {
                            inverted: true,
                            polar: false
                        },
                        subtitle: {
                            text: 'Inverted'
                        }
                    });
                });

                $('#polar').click(function () {
                    chart.update({
                        chart: {
                            inverted: false,
                            polar: true
                        },
                        subtitle: {
                            text: 'Polar'
                        }
                    });
                });
            });
        </script>
    @endif

@stop

