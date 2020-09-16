@extends('admin::layouts.master')
@section('content')
    <section class="content-header">
        <h1>
            Quản lí bài viết
            {{--            <small>Control panel</small>--}}
        </h1>
{{--        <ol class="breadcrumb">--}}
{{--            <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>--}}
{{--            <li class="active" ><a href="{{route('admin.get.list.article')}}"> Quản lí bài viết</a></li>--}}

{{--        </ol>--}}
    </section>

    <section class="content">

        <div class="row">
            <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách bài viết  </h3>
                    </div>
                    <div class="box-header">
                        <div class="col-sm-8">
                            <form class="form-inline" action="" >
                                <div class="form-group">
                                    <input type="text" name="a_name" placeholder="Tên bài viết" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-danger"><i class="fa fa-search">Tìm kiếm</i></button>
                            </form>
                        </div>
                        <a href="{{route('admin.get.create.article')}}" type="button" class="btn btn-primary pull-right">Thêm mới</a>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên bài viết</th>
                                <th>Avatar</th>
                                <th>Mô tả</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo / Ngày Update</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody >
                            @if(isset($articles))

                                @foreach($articles as $stt => $article)

                                    <tr>
                                        <td>{{$stt + 1}}</td>
                                        <td>{{$article->a_name}}</td>
                                        <td>
                                            <img src="{{pare_url_file($article->a_avatar)}}" width="100px" height="100px" alt="">
                                        </td>
                                        <td>{{$article->a_description}}</td>
                                        <td>
                                            <a class="label {{ $article->getStatus($article->a_active) ['class'] }}" href="{{ route('admin.get.action.article',['active',$article->id])}}">
                                                {{ $article->getStatus($article->a_active) ['name'] }}
                                            </a>
                                        </td>
                                        <td>{{date_format($article->created_at, 'd/m/yy')}} --- {{date_format($article->updated_at, 'd/m/yy')}}</td>
                                        <td>
                                            <a href="{{route('admin.get.edit.article',$article->id)}}"  ><i class="fa fa-edit"></i></a> &nbsp;
                                            <a href="{{route('admin.get.action.article',['delete',$article->id])}}"  onclick="return confirm('Are you sure?')"><i class="fa fa-remove"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>STT</th>
                                <th>Tên bài viết</th>
                                <th>Avatar</th>
                                <th>Mô tả</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo / Ngày Update</th>
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


