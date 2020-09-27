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
                <div class="col-md-6 col-xs-12">
                    <div class="customer-register my-account">
                    <form method="post" class="register" action="">
                        @csrf
                        <div class="form-fields" >
                                <h4>Thay đổi mật khẩu</h4>
                                <p class="form-row form-row-wide" style="position: relative">
                                    <label for="reg_password_old">Nhập Password cũ<span class="required">*</span></label>
                                    <input type="password" class="input-text" placeholder="***********" name="password_old" id="reg_password_old">
                                    <a style="position: absolute; top: 57%; right: 10px; color: #6e6b5e" href="javascript:void(0)"> <i class="fa fa-eye-slash"></i> </a>
                                </p>
                                @if($errors->has('password_old'))
                                    <div class="error-text" style="color: #e6193c; font-size: 10px">
                                        {{$errors->first('password_old')}}
                                    </div>
                                @endif
                                <p class="form-row form-row-wide" style="position: relative">
                                    <label for="reg_password_new">Nhập Password mới<span class="required">*</span></label>
                                    <input type="password"  class="input-text" placeholder="***********" name="password" id="reg_password_new">
                                    <a style="position: absolute; top: 57%;right: 10px; color: #6e6b5e" href="javascript:void(0)"> <i class="fa fa-eye-slash"></i> </a>
                                </p>
                                @if($errors->has('password'))
                                    <div class="error-text" style="color: #e6193c; font-size: 10px">
                                        {{$errors->first('password')}}
                                    </div>
                                @endif
                                <p class="form-row form-row-wide" style="position: relative">
                                    <label for="reg_password">Nhập lại Password <span class="required">*</span></label>
                                    <input type="password"  class="input-text" placeholder="***********" name="password_comfirm" id="reg_password">
                                    <a style="position: absolute; top: 57%; right: 10px;color: #6e6b5e" href="javascript:void(0)"> <i class="fa fa-eye-slash"></i></a>
                                </p>
                                @if($errors->has('password_comfirm'))
                                    <div class="error-text"style="color: #e6193c; font-size: 10px">
                                        {{$errors->first('password_comfirm')}}
                                    </div>
                                @endif
                                <div style="left: -999em; position: absolute;">
                                    <label for="trap">Anti-spam</label>
                                    <input type="text" name="email_2" id="trap" tabindex="-1">
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
    </div>
@stop
@section('script')
    <script>
        //show password
        $(function () {
            $(".form-row-wide a").click(function () {
                let $this = $(this);
                if($this.hasClass('active'))
                {
                    $this.parents('.form-row-wide').find('input').attr('type','text')
                    $this.removeClass('active');
                }
                else
                {
                    $this.parents('.form-row-wide').find('input').attr('type','password')
                    $this.addClass('active');
                }
            })
        })
    </script>
@stop
