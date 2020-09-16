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
                            <li class="category3"><span>Đăng kí</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="customer-login-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="customer-register my-account">
                        <form method="post" class="register" action="">
                            @csrf
                            <div class="form-fields">
                                <h2>Đăng kí</h2>
                                <p class="form-row form-row-wide">
                                    <label for="reg_name">Họ tên <span class="required">*</span></label>
                                    <input type="text" class="input-text"  name="name" id="reg_name" value="{{old('name',isset($user->name) ? $user->name : '')}}">
                                </p>
                                @if($errors->has('name'))
                                    <div class="error-text">
                                        {{$errors->first('name')}}
                                    </div>
                                @endif
                                <p class="form-row form-row-wide">
                                    <label for="reg_email">Email <span class="required">*</span></label>
                                    <input type="email" class="input-text" name="email" id="reg_email" value="{{old('email',isset($user->email) ? $user->email : '')}}">
                                </p>
                                @if($errors->has('email'))
                                    <div class="error-text">
                                        {{$errors->first('email')}}
                                    </div>
                                @endif
                                <p class="form-row form-row-wide">
                                    <label for="reg_password">Password <span class="required">*</span></label>
                                    <input type="password" class="input-text" name="password" id="reg_password">
                                </p>
                                @if($errors->has('password'))
                                    <div class="error-text">
                                        {{$errors->first('password')}}
                                    </div>
                                @endif
                                <p class="form-row form-row-wide">
                                    <label for="reg_phone">Số điện thoại <span class="required">*</span></label>
                                    <input type="text" class="input-text" name="phone" id="reg_phone" value="{{old('phone',isset($user->phone) ? $user->phone : '')}}">
                                </p>
                                @if($errors->has('phone'))
                                    <div class="error-text">
                                        {{$errors->first('phone')}}
                                    </div>
                                @endif
                                <div style="left: -999em; position: absolute;">
                                    <label for="trap">Anti-spam</label>
                                    <input type="text" name="email_2" id="trap" tabindex="-1">
                                </div>
                            </div>
                            <div class="form-action">
                                <div class="actions-log">
                                    <input type="submit" class="button" name="register" value="Đăng kí">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
