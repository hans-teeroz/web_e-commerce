@extends('admin::layouts.master')
@section('content')
    <section class="content-header">
        <h1>
            Quản lí đơn hàng
            {{--            <small>Control panel</small>--}}
        </h1>
{{--        <ol class="breadcrumb">--}}
{{--            <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>--}}
{{--            <li class="active" ><a href="{{route('admin.get.list.transaction')}}"> Quản lí đơn hàng</a></li>--}}

{{--        </ol>--}}
    </section>
    <section class="content">
        <div class="row">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Danh sách đơn hàng  </h3>
                    <a href="{{route('admin.get.create.category')}}" type="button" class="btn btn-primary pull-right">Thêm mới</a>

                </div>
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
                                        <td>{{ $stt + 1 }}</td>
                                        <td>
                                            <ul>
                                                <li>Họ tên: {{ isset($transaction->getUser->name) ? $transaction->getUser->name : '[N\A]' }}</li>
                                                <li>Phone: {{ isset($transaction->tr_phone) ? $transaction->tr_phone : $transaction->getUser->phone }}</li>
                                                <li>Địa chỉ: {{ isset($transaction->tr_address) ? $transaction->tr_address : $transaction->getUser->address}}</li>
                                                <li>Trạng thái:
                                                    <a style="{{$transaction->tr_status == 1 ? 'pointer-events: none;' : ''}}" class="label {{ $transaction->getStatus($transaction->tr_status) ['class'] }}" href="{{ $transaction->tr_status == 0  ? route('admin.get.action.transaction',['active',$transaction->id]) : route('admin.get.action.transaction',['error',$transaction->id])}}" >
                                                        {{ $transaction->getStatus($transaction->tr_status) ['name'] }}
                                                    </a>
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
                                            <a class="js_order_item" data-total="{{number_format($transaction->tr_total)}}" data-id="{{$transaction->id}}" href="{{route('admin.get.view.order',$transaction->id)}}"  ><i class="fa fa-eye-slash"></i></a> &nbsp;
                                            <a href="{{route('admin.get.action.transaction',['delete',$transaction->id])}}"  onclick="return confirm('Are you sure?')"><i class="fa fa-remove"></i></a>
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
