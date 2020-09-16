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
{{--            <li class="active">Thêm mới</li>--}}
{{--        </ol>--}}
    </section>
    <section class="content">
        @include("admin::category.form")
    </section>
@stop


