@extends('admin::layouts.master')
@section('content')
    <section class="content-header">
        <h1>
            Quản lí sản phẩm
            {{--            <small>Control panel</small>--}}
        </h1>
{{--        <ol class="breadcrumb">--}}
{{--            <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>--}}
{{--            <li class="active" ><a href="{{route('admin.get.list.product')}}"> Quản lí sản phẩm</a></li>--}}

{{--        </ol>--}}
    </section>

    <section class="content">

        <div class="row">
            <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách sản phẩm  </h3>
                    </div>
                    <div class="box-header">
                        <div class="col-sm-8">
                            <form class="form-inline" action="" >
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Tên sản phẩm" class="form-control">
                                </div>
                                <div class="form-group">
                                    <select name="cate" class="form-control">
                                        <option value="">Danh mục</option>
                                        @if (isset($categories ))
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ \Request::get('cate') == $category->id ? "selected=selected" : '' }}>{{ $category->c_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-danger"><i class="fa fa-search">Tìm kiếm</i></button>
                            </form>
                        </div>
                        <a href="{{route('admin.get.create.product')}}" type="button" class="btn btn-primary pull-right">Thêm mới</a>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Thuộc tính sản phẩm</th>
                                <th>Avatar</th>
                                <th>Giá - Khuyến mãi</th>
                                <th>Mô tả</th>
                                <th>Trạng thái</th>
                                <th>Nổi bật</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody >
                            @if(isset($products))

                                @foreach($products as $stt => $product)

                                    <tr>
                                        <td>{{$stt + 1}}</td>
                                        <td>
                                            <ul>
                                                <li>Tên sản phẩm - (Loại sản phẩm): {{$product->pro_name}} - (  {{isset($product->category->c_name) ? $product->category->c_name : '[N\A]'}} )</li>
                                                <li>Số lượng: {{$product->pro_number}} - <span class="label {{$product->pro_number < 1 ? 'label-danger' : 'label-success'}}">{{$product->pro_number < 1 ? 'Tạm hết hàng' : 'Còn hàng'}}</span> </li>
                                                <li>Sale: {{$product->pro_sale}}%</li>
                                            </ul>

                                        </td>
                                        <td>
                                            <img src="{{pare_url_file($product->pro_avatar)}}" width="100px" height="100px" alt="">
                                        </td>
                                        <td>{{number_format($product->pro_price)}} VNĐ  {{$product->pro_sale > 0 ? '- Sale: '.number_format(($product->pro_price-($product->pro_price*$product->pro_sale)/100)).' VNĐ' : ''}}</td>
                                        <td>{{$product->pro_description}}</td>
                                        <td>
                                            <a  class="label {{ $product->getStatus($product->pro_active) ['class'] }}" href="{{ route('admin.get.action.product',['active',$product->id])}}">
                                                {{ $product->getStatus($product->pro_active) ['name'] }}
                                            </a>
                                        </td>
                                        <td>
                                            <a class="label {{ $product->gethot($product->pro_hot) ['class'] }}"  href="{{ route('admin.get.action.product',['hot',$product->id])}}">{{ $product->gethot($product->pro_hot) ['name'] }}
                                            </a>
                                        </td>
                                        <td>
                                            <a class="view-news" data-content="{{ $product->pro_content }} "  data-id="{{$product->pro_name}}" ><i class="fa fa-eye-slash"></i></a> &nbsp;
                                            <a href="{{route('admin.get.edit.product',$product->id)}}"  ><i class="fa fa-edit"></i></a> &nbsp;
                                            <a href="{{route('admin.get.action.product',['delete',$product->id])}}"  onclick="return confirm('Are you sure?')"><i class="fa fa-remove"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Thuộc tính sản phẩm</th>
                                <th>Avatar</th>
                                <th>Giá + Khuyến mãi</th>
                                <th>Mô tả</th>
                                <th>Trạng thái</th>
                                <th>Nổi bật</th>
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

    <div id="detail-post" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div id="content" class="modal-content" style="width: 700px">
                <div class="modal-header bg-info text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 id="a_name" class="modal-title"><strong class="transaction_id"></strong></h3>
                </div>
                <div class="a_content">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-circle" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


@stop
@section('script')
    <script>
        $(function () {
            $(".view-news").click(function (event) {
                event.preventDefault();
                let $this = $(this);
                let url = $this.attr('href');
                $(".transaction_id").text($this.attr('data-id'));
                $(".a_content").html($this.attr('data-content'));
                //console.log(url);
                $("#detail-post").modal('show');


            });
        })
    </script>
@stop


