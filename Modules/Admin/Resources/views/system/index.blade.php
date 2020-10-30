@extends('admin::layouts.master')
@section('content')
    <section class="content-header">
        <h1>Hệ thống</h1>
    </section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Cập nhật hệ thống:</h3>
            </div>
            <!-- /.box-header -->
            <form  action="" method="POST" enctype="multipart/form-data">
                @csrf
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="sys_name" >Tên Website</label>
                                    <input type="text" class="form-control" name="sys_name" value="{{old('sys_name',isset($system->sys_name) ? $system->sys_name : '')}}"  placeholder="Nhập tên Website">
                                    @if($errors->has('sys_name'))
                                        <div class="error-text">
                                            {{$errors->first('sys_name')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="sys_info" >Thông tin Website</label>
                                    <textarea name="sys_info" value="{{old('sys_info')}}" class="form-control" rows="3" placeholder="Mô tả Website ..." style="margin: 0px 4.5px 0px 0px; width: 100%; height: 78px;">{{isset($system->id)? old('sys_info',$system->sys_info) : old('sys_info')}}</textarea>
                                    @if($errors->has('sys_info'))
                                        <div class="error-text">
                                            {{$errors->first('sys_info')}}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="sys_address" >Địa chỉ</label>
                                    <input type="text" value="{{old('sys_address',isset($system->sys_address) ? $system->sys_address : '')}}" class="form-control" name="sys_address"  placeholder="Nhập địa chỉ">
                                    @if($errors->has('sys_address'))
                                        <div class="error-text">
                                            {{$errors->first('sys_address')}}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="sys_email" >Email Website</label>
                                    <input type="email" class="form-control" name="sys_email" value="{{old('sys_email',isset($system->sys_email) ? $system->sys_email : '')}}" placeholder="Nhập email" required>
                                </div>
                                <div class="form-group">
                                    <label for="sys_phone" >Phone</label>
                                    <input type="text" class="form-control" name="sys_phone" value="{{old('sys_phone',isset($system->sys_phone) ? $system->sys_phone : '')}}" placeholder="Nhập SĐT">
                                    @if($errors->has('sys_phone'))
                                        <div class="error-text">
                                            {{$errors->first('sys_phone')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="sys_open_hour" >Giờ mở cửa</label>
                                    <input type="text" class="form-control" name="sys_open_hour" value="{{old('sys_open_hour',isset($system->sys_open_hour) ? $system->sys_open_hour : '')}}" placeholder="T2 - T7, 9h - 20h">
                                    @if($errors->has('sys_open_hour'))
                                        <div class="error-text">
                                            {{$errors->first('sys_open_hour')}}
                                        </div>
                                    @endif
                                </div>

                            </div>
                            <!-- /.box-body -->

                        </div>
                        <!-- /.box -->

                        <!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-6">
                            <div class="box-body">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="sys_title" >Tiêu đề Website</label>
                                        <input type="text" class="form-control" name="sys_title" value="{{old('sys_title',isset($system->sys_title) ? $system->sys_title : '')}}" placeholder="Tiêu đề Website">
                                        @if($errors->has('sys_title'))
                                            <div class="error-text">
                                                {{$errors->first('sys_title')}}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <img id="output_image" src="{{isset($system->sys_avatar) ? pare_url_file($system->sys_avatar) : asset('image/no_image.png')}}" alt="" width="200px" height="189px">
                                    </div>

                                    <div class="form-group">
                                        <label for="sys_avatar">Avatar</label>
                                        <input type="file" id="input_image" value="{{old('sys_avatar',isset($system->sys_avatar) ? pare_url_file($system->sys_avatar) : asset('image/no_image.png'))}}" name="sys_avatar">
                                        @if($errors->has('sys_avatar'))
                                            <div class="error-text">
                                                {{$errors->first('sys_avatar')}}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="sys_fb" >Facebook ID fanpage</label>
                                        <input name="sys_fb" type="text" class="form-control"  value="{{old('sys_fb',isset($system->sys_fb) ? $system->sys_fb : '')}}" placeholder="Facebook ID chatbot">
                                    </div>

                                    <div class="form-group">
                                        <label for="sys_zalo" >Zalo OA</label>
                                        <input type="text" class="form-control" name="sys_zalo" value="{{old('sys_zalo',isset($system->sys_zalo) ? $system->sys_zalo : '')}}" placeholder="Zalo OA chatbot">
                                    </div>
                                </div>
                                <!-- /.box-body -->

                                <!-- /.box -->

                            </div>
                            <!--/.col (right) -->
                        </div>
                        <!-- /.row -->
                    </div>
                </section>

                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>

    </section>
@stop
