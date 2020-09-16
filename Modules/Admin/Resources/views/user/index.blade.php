@extends('admin::layouts.master')
@section('content')
    <section class="content-header">
        <h1>
            Quản lí user
            {{--            <small>Control panel</small>--}}
        </h1>
{{--        <ol class="breadcrumb">--}}
{{--            <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>--}}
{{--            <li class="active" ><a href="{{route('admin.get.list.transaction')}}"> Quản lí user</a></li>--}}

{{--        </ol>--}}
    </section>
    <section class="content">
        <div class="row">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Danh sách user  </h3>
                    <a href="{{route('admin.get.create.category')}}" type="button" class="btn btn-primary pull-right">Thêm mới</a>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên user</th>
                            <th>Avatar</th>
                            <th>Email</th>
                            <th>SĐT</th>
                            <th>Chức danh</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody >
                        @if(isset($users))
                            @foreach($users as $stt => $user)
                                <tr>
                                    <td>{{$stt + 1}}</td>
                                    <td>{{$user->name}} </td>
                                    <td>
                                        {{--                                            <img src="{{pare_url_file($product->a_avatar)}}" width="100px" height="100px" alt="">--}}
                                    </td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->u_level}}</td>
                                    {{--                                        <td>--}}
                                    {{--                                            <a class="label {{ ($product->a_active > 0) ? 'label-danger' : 'label-default' }}"  href="{{ route('admin.get.action.product',['active',$product->id])}}">--}}
                                    {{--                                                {{  ($product->a_active >0) ? 'Public' : 'Private' }}--}}
                                    {{--                                            </a>--}}
                                    {{--                                        </td>--}}
                                    {{--                                        <td>--}}
                                    {{--                                            <a class="label {{ ($product->a_hot > 0) ? 'label-success' : 'label-warning' }}"  href="{{ route('admin.get.action.product',['hot',$product->id])}}">--}}
                                    {{--                                                {{  ($product->a_hot >0) ? 'Nổi bật' : 'Không' }}--}}
                                    {{--                                            </a>--}}
                                    {{--                                        </td>--}}
                                    <td>
                                        <a href="{{route('admin.get.edit.product',$user->id)}}"  ><i class="fa fa-edit"></i></a> &nbsp;
                                        <a href="{{route('admin.get.action.product',['delete',$user->id])}}"  onclick="return confirm('Are you sure?')"><i class="fa fa-remove"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Tên user</th>
                            <th>Avatar</th>
                            <th>Email</th>
                            <th>SĐT</th>
                            <th>Chức danh</th>
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



@stop

