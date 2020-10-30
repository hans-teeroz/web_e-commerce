<style >
    .fb_dialog_content iframe {
        margin: 0px 19px !important;
        padding: 0px !important;
        position: fixed ;
        z-index: 2147483644 ;
        bottom: 160px !important;
        top: auto ;
        height: 60px ;
        width: 60px ;
        border-radius: 29px ;
        box-shadow: rgba(0, 0, 0, 0.15) 0px 4px 12px 0px ;
        background: none ;
        display: block ;
        right: 0px !important;
    }
    .zalo-chat-widget{
        position: absolute;
        bottom: 80px !important;
        right: 15px !important;
    }
</style>
<div class="brand-area">
    <div class="container">
        <div class="row">
            <div class="brand-carousel">
                <div class="brand-item"><a href="#"><img src="{{asset('themes_template/img/brand/bg1-brand.jpg')}}" alt="" /></a></div>
                <div class="brand-item"><a href="#"><img src="{{asset('themes_template/img/brand/bg2-brand.jpg')}}" alt="" /></a></div>
                <div class="brand-item"><a href="#"><img src="{{asset('themes_template/img/brand/bg3-brand.jpg')}}" alt="" /></a></div>
                <div class="brand-item"><a href="#"><img src="{{asset('themes_template/img/brand/bg4-brand.jpg')}}" alt="" /></a></div>
                <div class="brand-item"><a href="#"><img src="{{asset('themes_template/img/brand/bg5-brand.jpg')}}" alt="" /></a></div>
                <div class="brand-item"><a href="#"><img src="{{asset('themes_template/img/brand/bg2-brand.jpg')}}" alt="" /></a></div>
                <div class="brand-item"><a href="#"><img src="{{asset('themes_template/img/brand/bg3-brand.jpg')}}" alt="" /></a></div>
                <div class="brand-item"><a href="#"><img src="{{asset('themes_template/img/brand/bg4-brand.jpg')}}" alt="" /></a></div>
            </div>
        </div>
    </div>
</div>
<footer>
    <!-- top footer area start -->
    <div class="top-footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="single-snap-footer">
                        <div class="snap-footer-title">
                            <h4>Thông tin Shop</h4>
                        </div>
                        <div class="cakewalk-footer-content">
                            <p class="footer-des">{{isset($system->sys_info) ? $system->sys_info : ""}}</p>
{{--                            <a href="#" class="read-more">Read more</a>--}}
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="single-snap-footer">
                        <div class="snap-footer-title">
                            <h4>Information</h4>
                        </div>
                        <div class="cakewalk-footer-content">
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Delivery Information</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Condition</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="single-snap-footer">
                        <div class="snap-footer-title">
                            <h4>Fashion Tags</h4>
                        </div>
                        <div class="cakewalk-footer-content">
                            <ul>
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Login</a></li>
                                <li><a href="#">My Cart</a></li>
                                <li><a href="#">Wishlist</a></li>
                                <li><a href="#">Checkout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="single-snap-footer">
                        <div class="snap-footer-title">
                            <h4>Theo dõi chúng tôi</h4>
                        </div>
                        <div class="cakewalk-footer-content social-footer">
                            <ul>
                                <li><a href="https://www.facebook.com/{{isset($system->sys_fb) ? $system->sys_fb : ""}}" target="_blank"><i class="fa fa-facebook"></i></a><span> Facebook</span></li>
                                <li><a href="https://plus.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a><span> Google Plus</span></li>
                                <li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a><span> Twitter</span></li>
                                <li><a href="https://youtube.com/" target="_blank"><i class="fa fa-youtube-play"></i></a><span> Youtube</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- top footer area end -->
    <!-- info footer start -->
    <div class="info-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="info-fcontainer">
                        <div class="infof-icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="infof-content">
                            <h3>Địa chỉ</h3>
                            <p>{{isset($system->sys_address) ? $system->sys_address : ""}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="info-fcontainer">
                        <div class="infof-icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="infof-content">
                            <h3>SĐT hỗ trợ</h3>
                            <p>{{isset($system->sys_phone) ? $system->sys_phone : ""}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="info-fcontainer">
                        <div class="infof-icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="infof-content">
                            <h3>Email hỗ trợ</h3>
                            <p>{{isset($system->sys_email) ? $system->sys_email : ""}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 hidden-sm">
                    <div class="info-fcontainer">
                        <div class="infof-icon">
                            <i class="fa fa-clock-o"></i>
                        </div>
                        <div class="infof-content">
                            <h3>Giờ mở cửa</h3>
                            <p>{{isset($system->sys_open_hour) ? $system->sys_open_hour : ""}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml            : true,
                version          : 'v8.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat"
         attribution=setup_tool
         page_id="{{isset($system->sys_fb) ? $system->sys_fb : ""}}"
         theme_color="#ff7e29"
         logged_in_greeting="Hi! Tôi có thể giúp gì cho bạn?"
         logged_out_greeting="Hi! Tôi có thể giúp gì cho bạn?">
    </div>
    <div style="z-index: 2147483647; border: none; visibility: visible; bottom: 100px; right: 19px; position: fixed; width: 70px; height: 70px;" class="zalo-chat-widget" data-oaid="{{isset($system->sys_zalo) ? $system->sys_zalo : ""}}" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="350" data-height="420"></div>
    <script src="https://sp.zalo.me/plugins/sdk.js"></script>
</footer>
