@extends('layouts.app')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="/">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Tài khoản</span></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="customer-login-area">
        <div class="container">
            <div class="row">
                <div class="customer-register my-account">
                    <form method="post" class="register" action="" enctype="multipart/form-data">
                        @csrf
                        <div style="border-bottom:none" class="form-fields" >
                            <div class="col-md-6 col-xs-6">
                                    <h4>Thông tin của bạn</h4>
                                    <p class="form-row form-row-wide">
                                        <label for="reg_name">Họ tên <span class="required">*</span></label>
                                        <input type="text" class="input-text" required name="name" id="reg_name" value="{{get_data_user('web','name')}}">
                                    </p>
                                    <p class="form-row form-row-wide">
                                        <label for="reg_email">Email <span class="required">*</span></label>
                                        <input type="email" class="input-text" name="email" id="reg_email" value="{{get_data_user('web','email')}}" disabled="">
                                    </p>
                                    <p class="form-row form-row-wide">
                                        <label for="reg_phone">Địa chỉ <span class="required">*</span></label>
                                        <input type="text" class="input-text" name="address"  value="{{get_data_user('web','address')}}">
                                    </p>
                                    <p class="form-row form-row-wide" >
                                        <label for="reg_phone">Số điện thoại <span class="required">*</span></label>
                                        <input type="text" class="input-text" name="phone" id="reg_phone" value="{{get_data_user('web','phone')}}">
                                    </p>
                                    <div style="left: -999em; position: absolute;">
                                        <label for="trap">Anti-spam</label>
                                        <input type="text" name="email_2" id="trap" tabindex="-1">
                                    </div>
                                </div>
                            <div class="col-md-6 col-xs-6" style="margin-top: 34px">
                                <div class="form-group">
                                    <img id="output_image" src="{{get_data_user('web','avatar') ? pare_url_file(get_data_user('web','avatar')) : asset('image/no_image.png')}}" alt="" width="200px" height="200px">
                                </div>
                                <div class="form-group" style="margin-top: 34px">
                                    <label for="avatar">Avatar</label>
                                    <input type="file" id="input_image" value="{{get_data_user('web','avatar') ? pare_url_file(get_data_user('web','avatar')) : asset('image/no_image.png')}}" width="200px" height="200px" name="avatar">
                                </div>
                            </div>
                        </div>
                        <div class="form-action">
                            <div class="actions-log">
                                <input type="submit" class="button" value="Lưu thay đổi">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop
