@extends('admin::layouts.master')

@section('content')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <style>
        .highcharts-figure, .highcharts-data-table table {
            min-width: 310px;
            max-width: 800px;
            margin: 1em auto;
        }

        #container {
            height: 400px;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #EBEBEB;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }
        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }
        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }
        .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
            padding: 0.5em;
        }
        .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }
        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }

    </style>


    <section class="content-header">
        <h1>
            Trang tổng quan
        </h1>

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
{{--        <ul class="nav nav-pills ranges">--}}
{{--            <li class="active"><a href="#" data-range='7'>7 Days</a></li>--}}
{{--            <li><a href="#" data-range='30'>30 Days</a></li>--}}
{{--            <li><a href="#" data-range='60'>60 Days</a></li>--}}
{{--            <li><a href="#" data-range='90'>90 Days</a></li>--}}
{{--        </ul>--}}
{{--        <div id="stats-container" style="height: 250px;"></div>--}}

{{--        @if(isset($productBuy))--}}
{{--            <div id="container" data-order="{{ $productBuy }}"></div>--}}
{{--        @else--}}
{{--            <div id="container" data-order="{{ $orderYear }}"></div>--}}
{{--        @endif--}}
        <div class="row">
            <div class="col-sm-4">
                <figure class="highcharts-figure">
                    <div id="container"></div>
                </figure>
            </div>
            <div class="col-sm-8">
                <h4>Danh sách đơn hàng mới nhất</h4>
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Thông tin đơn hàng</th>
                            <th>Tổng tiền</th>
                            <th>Thời gian</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody >
                        @if($transactionNews)
                            @foreach($transactionNews as $stt => $transaction)
                                <tr>
                                    <td>{{ $stt + 1 }}</td>
                                    <td>
                                        <ul>
                                            <li>Họ tên: {{ isset($transaction->getUser->name) ? $transaction->getUser->name : '[N\A]' }}</li>
                                            <li>Phone: {{ $transaction->getUser->phone }}</li>
                                            <li>Địa chỉ: {{ $transaction->tr_address}}</li>
                                            <li>Trạng thái:
                                                <a style="{{$transaction->tr_status == 1 ? 'pointer-events: none;' : ''}}" class="label {{ $transaction->getStatus($transaction->tr_status) ['class'] }}" href="{{ $transaction->tr_status == 0  ? route('admin.get.action.transaction',['active',$transaction->id]) : route('admin.get.action.transaction',['error',$transaction->id])}}" >
                                                    {{ $transaction->getStatus($transaction->tr_status) ['name'] }}
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>{{number_format($transaction->tr_total)}} VNĐ </td>
                                    <td>{{date_format($transaction->created_at, 'd-m-Y H:i:s')}}</td>
                                    <td>
                                        <a class="js_order_item" data-total="{{number_format($transaction->tr_total)}}" data-id="{{$transaction->id}}" href="{{route('admin.get.view.order',$transaction->id)}}"  ><i class="fa fa-eye-slash"></i></a> &nbsp;
                                        <a href="{{route('admin.get.action.transaction',['delete',$transaction->id])}}"  onclick="return confirm('Are you sure?')"><i class="fa fa-remove"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
    <div class="modal" id="myModalOrder" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Chi tiết đơn hàng số: <b class="transaction_id"></b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="md_content">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
@stop
@section('script')
    <script>
        let data = "{{$dataMoney}}";
        var today = new Date();
        dataChart = JSON.parse(data.replace(/&quot;/g,'"'));
        //console.log(dataChart);
        // Create the chart
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Doanh thu trong ngày '+ today.getDate() +' / tháng '+ today.getMonth() +' / năm ' + today.getFullYear()
            },
            // subtitle: {
            //     text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
            // },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Mức doanh thu'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y}'+'VNĐ'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> VNĐ<br/>'
            },

            series: [
                {
                    name: "Doanh thu",
                    colorByPoint: true,
                    data: dataChart
                }
            ],
        });
    </script>
    <script>
        $(function () {
            $(".js_order_item").click(function (event) {
                event.preventDefault();
                let $this = $(this);
                let url = $this.attr('href');
                $("#md_content").html('');
                $(".transaction_id").text($this.attr('data-id'));
                //$(".total").text($this.attr('data-total'));
                $("#myModalOrder").modal('show');
                //console.log(url);
                $.ajax({
                    url: url,
                }).done(function (result) {
                    //console.log(result);
                    if (result)
                    {
                        $("#md_content").append(result);
                    }
                });
            });
        })
    </script>
@stop
{{--@section('script')--}}
{{--    @if(isset($productBuy))--}}
{{--        <script>--}}
{{--            $(document).ready(function(){--}}
{{--                var productBuy = $('#container').data('order');--}}
{{--                var chartData = [];--}}
{{--                productBuy.forEach(function(element){--}}
{{--                    var ele = {name : element.name, y : parseFloat(element.y) };--}}
{{--                    chartData.push(ele);--}}
{{--                });--}}
{{--                console.log(chartData);--}}
{{--                Highcharts.chart('container', {--}}
{{--                    chart: {--}}
{{--                        plotBackgroundColor: null,--}}
{{--                        plotBorderWidth: null,--}}
{{--                        plotShadow: false,--}}
{{--                        type: 'pie'--}}
{{--                    },--}}
{{--                    title: {--}}
{{--                        text: 'Daily order'--}}
{{--                    },--}}
{{--                    tooltip: {--}}
{{--                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'--}}
{{--                    },--}}
{{--                    plotOptions: {--}}
{{--                        pie: {--}}
{{--                            allowPointSelect: true,--}}
{{--                            cursor: 'pointer',--}}
{{--                            dataLabels: {--}}
{{--                                enabled: false--}}
{{--                            },--}}
{{--                            showInLegend: true--}}
{{--                        }--}}
{{--                    },--}}
{{--                    series: [{--}}
{{--                        name: 'Brands',--}}
{{--                        colorByPoint: true,--}}
{{--                        data: chartData,--}}
{{--                    }]--}}
{{--                });--}}
{{--            });--}}
{{--        </script>--}}
{{--    @else--}}
{{--        <script>--}}
{{--            $(document).ready(function(){--}}
{{--                var order = $('#container').data('order');--}}
{{--                var listOfValue = [];--}}
{{--                var listOfYear = [];--}}
{{--                order.forEach(function(element){--}}
{{--                    listOfYear.push(element.getYear);--}}
{{--                    listOfValue.push(element.value);--}}
{{--                });--}}
{{--                console.log(listOfValue);--}}
{{--                var chart = Highcharts.chart('container', {--}}

{{--                    title: {--}}
{{--                        text: 'Orders by years'--}}
{{--                    },--}}

{{--                    subtitle: {--}}
{{--                        text: 'Plain'--}}
{{--                    },--}}

{{--                    xAxis: {--}}
{{--                        categories: listOfYear,--}}
{{--                    },--}}

{{--                    series: [{--}}
{{--                        type: 'column',--}}
{{--                        colorByPoint: true,--}}
{{--                        data: listOfValue,--}}
{{--                        showInLegend: false--}}
{{--                    }]--}}
{{--                });--}}

{{--                $('#plain').click(function () {--}}
{{--                    chart.update({--}}
{{--                        chart: {--}}
{{--                            inverted: false,--}}
{{--                            polar: false--}}
{{--                        },--}}
{{--                        subtitle: {--}}
{{--                            text: 'Plain'--}}
{{--                        }--}}
{{--                    });--}}
{{--                });--}}

{{--                $('#inverted').click(function () {--}}
{{--                    chart.update({--}}
{{--                        chart: {--}}
{{--                            inverted: true,--}}
{{--                            polar: false--}}
{{--                        },--}}
{{--                        subtitle: {--}}
{{--                            text: 'Inverted'--}}
{{--                        }--}}
{{--                    });--}}
{{--                });--}}

{{--                $('#polar').click(function () {--}}
{{--                    chart.update({--}}
{{--                        chart: {--}}
{{--                            inverted: false,--}}
{{--                            polar: true--}}
{{--                        },--}}
{{--                        subtitle: {--}}
{{--                            text: 'Polar'--}}
{{--                        }--}}
{{--                    });--}}
{{--                });--}}
{{--            });--}}
{{--        </script>--}}
{{--    @endif--}}

{{--@stop--}}

