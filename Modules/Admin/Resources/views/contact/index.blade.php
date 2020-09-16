@extends('admin::layouts.master')
@section('content')
    <section class="content-header">
        <h1>
            Đóng góp ý kiến
            {{--            <small>Control panel</small>--}}
        </h1>
{{--        <ol class="breadcrumb">--}}
{{--            <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>--}}
{{--            <li class="active" ><a href="{{route('admin.get.list.contact')}}"> Đóng góp ý kiến</a></li>--}}

{{--        </ol>--}}
    </section>
    <section class="content">
        <div class="row">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Danh sách</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên - Email</th>
                            <th>Tiêu đề</th>
                            <th>Nội dung</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody >
                        @if(isset($contacts))

                            @foreach($contacts as $stt => $contact)

                                <tr>
                                    <td>{{$stt + 1}}</td>
                                    <td>
                                        {{$contact->c_name}} - {{$contact->c_email}}
                                    </td>
                                    <td>
                                        {{$contact->c_title}}
                                        <br>
                                        <a class="label {{ $contact->getStatus($contact->c_status) ['class'] }}" href="{{ route('admin.get.action.contact',['active',$contact->id])}}">
                                            {{ $contact->getStatus($contact->c_status) ['name'] }}
                                        </a>
                                    </td>
                                    <td>{{$contact->c_content}}</td>
                                    <td>
                                        <a href="{{route('admin.get.action.contact',['delete',$contact->id])}}"  onclick="return confirm('Are you sure?')"><i class="fa fa-remove"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif




                        </tbody>
                        <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Tên - Email</th>
                            <th>Tiêu đề</th>
                            <th>Nội dung</th>
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


