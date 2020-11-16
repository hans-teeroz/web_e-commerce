@extends('layouts.app')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="/">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Đơn hàng của bạn</span></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="customer-login-area">
        <div class="container">
            <div class="row">
                <div class="customer-register my-account">
                    <div style="border-bottom:1px solid #d3d3d3;" class="form-fields" >
                        <div class="col-md-12 col-xs-12">
                            <h4>Đơn hàng của bạn</h4>
                            <section class="content">
                                <div class="container-fluid">
                                    <!-- Small boxes (Stat box) -->
                                    <div class="row">
                                        <div class="col-lg-4 col-6" >
                                            <!-- small box -->
                                            <div class="small-box bg-aqua">
                                                <div class="inner">
                                                    <h3>{{$transactionTotal}}</h3>
                                                    <p>Tổng đơn hàng</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-bag"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- ./col -->
                                        <div class="col-lg-4 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-green">
                                                <div class="inner">
                                                    <h3>{{$transactionDone}}</h3>

                                                    <p>Đơn hàng đã xử lý</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-social-buffer"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- ./col -->
                                        <div class="col-lg-4 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-red">
                                                <div class="inner">
                                                    <h3>{{$transactionTotal-$transactionDone}}</h3>

                                                    <p>Đơn hàng chưa xử lý</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-backspace"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- ./col -->
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-6" >
                                            <section class="content">
                                                <div class="row">
                                                    <div class="box">
                                                        <!-- /.box-header -->
                                                        <div class="box-body">
                                                            <table id="example1" class="table table-bordered table-striped">
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
                                                                @if(isset($transactions))
                                                                    @foreach($transactions as $stt => $transaction)
                                                                        <tr>
                                                                            <td>{{$stt +1}}</td>
                                                                            <td>
                                                                                <ul>
                                                                                    <li>Phone: {{ isset($transaction->tr_phone) ? $transaction->tr_phone : $transaction->getUser->phone }}</li>
                                                                                    <li>Địa chỉ: {{ isset($transaction->tr_address) ? $transaction->tr_address : $transaction->getUser->address}}</li>
                                                                                    <li>Trạng thái:
                                                                                        <p style="{{$transaction->tr_status == 1 ? 'pointer-events: none;' : ''}}" class="label {{ $transaction->getStatus($transaction->tr_status) ['class'] }}">
                                                                                            {{ $transaction->getStatus($transaction->tr_status) ['name'] }}
                                                                                        </p>
                                                                                    </li>
                                                                                    <li>Hình thức thanh toán:
                                                                                        @if($transaction->tr_payment == 0)
                                                                                            <span class="label label-default">COD</span>
                                                                                        @endif
                                                                                        @if($transaction->tr_payment == 1)
                                                                                            <span class="label label-info">PayPal</span>
                                                                                        @endif
                                                                                        @if($transaction->tr_payment == 2)
                                                                                            <span class="label label-warning">VNPay</span>
                                                                                        @endif
                                                                                    </li>
                                                                                </ul>
                                                                            </td>
                                                                            <td>{{number_format($transaction->tr_total)}} VNĐ </td>
                                                                            <td>{{date_format($transaction->created_at, 'd-m-Y H:i:s')}}</td>
                                                                            <td>
                                                                                <a class="js_order_item" data-total="{{number_format($transaction->tr_total)}}" data-id="{{$transaction->id}}" href="{{route('user.get.view.order',$transaction->id)}}"  ><i class="fa fa-eye-slash"></i></a> &nbsp;
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                @endif

                                                                </tbody>
                                                                <tfoot>
                                                                <tr>
                                                                    <th>STT</th>
                                                                    <th>Thông tin đơn hàng</th>
                                                                    <th>Tổng tiền</th>
                                                                    <th>Thời gian</th>
                                                                    <th>Thao tác</th>
                                                                </tr>
                                                                </tfoot>
                                                            </table>
                                                            {{$transactions->appends(Request::all())->links()}}
                                                        </div>
                                                        <!-- /.box-body -->
                                                    </div>
                                                    <!-- /.box -->
                                                </div>
                                                <!-- /.col -->

                                                <!-- /.row -->
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
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
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
