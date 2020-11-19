@extends('layouts.app')
@section('content')
    <div class="customer-login-area">
        <div class="container">
            <div class="row">
                <div class="customer-register my-account">
                    <div style="border-bottom:1px solid #d3d3d3;" class="form-fields" >
                        <div class="col-md-12 col-xs-12">
                            <h4>Danh sách yêu thích của bạn</h4>
                            <section class="content">
                                <div class="container-fluid">
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
                                                                    <th>Sản phẩm</th>
                                                                    <th>Giá sản phẩm</th>
                                                                    <th>Thao tác</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody >
                                                                @if(isset($products))
                                                                    @foreach($products as $stt => $product)
                                                                        <tr>
                                                                            <td>{{$stt +1}}</td>
                                                                            <td>
                                                                                <dt class="title text-truncate"><a href="{{route('get.detail.product', [$product->pro_slug])}}" target="_blank">{{isset($product->pro_name) ? $product->pro_name : '[N\A]'}} </a></dt>
                                                                                <dt>Giá sản phẩm: {{number_format(($product->pro_price))}} VNĐ</dt>
                                                                                <dt>Sales: {{$product->pro_sale}} %</dt>
                                                                            </td>
                                                                            <td>
                                                                                <img src="{{isset($product->pro_avatar) ? pare_url_file($product->pro_avatar) : '[N\A]'}}" width="100px" height="100px" alt="">
                                                                            </td>
                                                                            <td>
                                                                                <a href="{{route('get.action.wishlist',['delete',$product->id])}}"  onclick="return confirm('Are you sure?')"><i class="fa fa-remove"></i></a>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                @endif

                                                                </tbody>
                                                                <tfoot>
                                                                <tr>
                                                                    <th>STT</th>
                                                                    <th>Sản phẩm</th>
                                                                    <th>Giá sản phẩm</th>
                                                                    <th>Thao tác</th>
                                                                </tr>
                                                                </tfoot>
                                                            </table>
                                                            @if(isset($products))
                                                                {{ $products->appends(Request::all())->links('vendor.pagination.default') }}
                                                            @endif
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

