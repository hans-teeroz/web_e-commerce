@extends('admin::layouts.master')
@section('content')
    <section class="content-header">
        <h1>
            Quản lí bài viết
                        <small>Control panel</small>
        </h1>
{{--        <ol class="breadcrumb">--}}
{{--            <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>--}}
{{--            <li class="active" ><a href="{{route('admin.get.list.article')}}"> Bài viết</a></li>--}}
{{--            <li class="active">Cập nhật</li>--}}
{{--        </ol>--}}
    </section>
    <section class="content">
       @include("admin::article.form")
    </section>
@stop


