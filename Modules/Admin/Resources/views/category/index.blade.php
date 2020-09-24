@extends('admin::layouts.master')
@section('content')
    <section class="content-header">
        <h1>
            Quản lí danh mục
            {{--            <small>Control panel</small>--}}
        </h1>
{{--        <ol class="breadcrumb">--}}
{{--            <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>--}}
{{--            <li class="active" ><a href="{{route('admin.get.list.category')}}"> Quản lí danh mục</a></li>--}}

{{--        </ol>--}}
    </section>
    <section class="content">
        <div class="row">
            <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách danh mục  </h3>
                        <a href="{{route('admin.get.create.category')}}" type="button" class="btn btn-primary pull-right">Thêm mới</a>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên danh mục</th>
                                <th>Title Seo</th>
                                <th>Trạng thái</th>
                                <th>Nổi bật</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody >
                                @if(isset($categories))

                                    @foreach($categories as $stt => $category)

                                        <tr>
                                            <td>{{$stt + 1}}</td>
                                            <td>{{$category->c_name}}</td>
                                            <td>{{$category->c_title_seo}}</td>
                                            <td>
                                                <a class="label {{ $category->getStatus($category->c_active) ['class'] }}" href="{{ route('admin.get.action.category',['active',$category->id])}}">
                                                    {{ $category->getStatus($category->c_active) ['name'] }}
                                                </a>
                                            </td>
                                            <td>
                                                <a class="label {{ $category->gethot($category->c_hot) ['class'] }}"  href="{{ route('admin.get.action.category',['hot',$category->id])}}">{{ $category->gethot($category->c_hot) ['name'] }}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{route('admin.get.edit.category',$category->id)}}"  ><i class="fa fa-edit"></i></a> &nbsp;
                                                <a href="{{route('admin.get.action.category',['delete',$category->id])}}"  onclick="return confirm('Are you sure?')"><i class="fa fa-remove"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                 @endif




                            </tbody>
                            <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Tên danh mục</th>
                                <th>Title Seo</th>
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



@stop


