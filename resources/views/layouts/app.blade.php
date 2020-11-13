<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if lt IE 7 ]> <html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="">
<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge,chrome=1">
    <meta name="google-site-verification" content="nRP-7xNgZ6fz6m-C4GWpUojdIKTlNgGY2Y4pw4Ewh1E" />
    <meta content="INDEX,FOLLOW" name="robots" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    {!! SEOMeta::generate() !!}--}}
{{--    {!! dd(OpenGraph::generate()) !!}--}}
    {!! SEO::generate() !!}
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="fb:pages" content="{{isset($system->sys_fb) ? $system->sys_fb : ""}}" />

{{--    <meta name="description" content="">--}}

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6KERMWM4JG"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-6KERMWM4JG');
    </script>
    <style>
        #scrollUp{
            bottom: 120px !important;
            left: 30px !important;
        }
    </style>
    <!-- Favicon
    ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('themes_template/img/favicon.ico')}}">

    <!-- Fonts
    ============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>

    <!-- CSS  -->


    <!-- Bootstrap CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('themes_template/css/bootstrap.min.css')}}">

    <!-- owl.carousel CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('themes_template/css/owl.carousel.css')}}">

    <!-- owl.theme CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('themes_template/css/owl.theme.css')}}">

    <!-- owl.transitions CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('themes_template/css/owl.transitions.css')}}">

    <!-- font-awesome.min CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('themes_template/css/font-awesome.min.css')}}">

    <!-- font-icon CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('themes_template/fonts/font-icon.css')}}">

    <!-- jquery-ui CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('themes_template/css/jquery-ui.css')}}">

    <!-- mobile menu CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('themes_template/css/meanmenu.min.css')}}">

    <!-- nivo slider CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('themes_template/custom-slider/css/nivo-slider.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('themes_template/custom-slider/css/preview.css')}}" type="text/css" media="screen" />

    <!-- animate CSS
   ============================================ -->
    <link rel="stylesheet" href="{{asset('themes_template/css/animate.css')}}">

    <!-- normalize CSS
   ============================================ -->
    <link rel="stylesheet" href="{{asset('themes_template/css/normalize.css')}}">

    <!-- main CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('themes_template/css/main.css')}}">

    <!-- style CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('themes_template/style.css')}}">

    <!-- responsive CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('themes_template/css/responsive.css')}}">

    <script src="{{asset('themes_template/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/ed01a85bc2cdeabc7f1031d8d/b198136d453d5d2559ed66544.js");</script>
</head>
<body class="home-one">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Add your site or application content here -->
<!-- header area start -->
@include('components.header')
<!-- header area end -->
<!-- start home slider -->
<section>
    @yield('content')
</section>

<!-- testimonial area start -->
{{--<div class="testimonial-area lap-ruffel">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                <div class="crusial-carousel">--}}
{{--                    <div class="crusial-content">--}}
{{--                        <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>--}}
{{--                        <span>BootExperts</span>--}}
{{--                    </div>--}}
{{--                    <div class="crusial-content">--}}
{{--                        <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>--}}
{{--                        <span>Lavoro Store!</span>--}}
{{--                    </div>--}}
{{--                    <div class="crusial-content">--}}
{{--                        <p>“Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat."</p>--}}
{{--                        <span>MR Selim Rana</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- testimonial area end -->
<!-- Brand Logo Area Start -->

<!-- Brand Logo Area End -->
<!-- FOOTER START -->
@include('components.footer')

<!-- FOOTER END -->

<!-- JS -->

<!-- jquery-1.11.3.min js

============================================ -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{asset('themes_template/js/vendor/jquery-1.11.3.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
                $(this).remove();
            });
            }, 5000);
    });
</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5f6dc72b4704467e89f23ae8/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
<script>
    function readUrl(input) {
        if (input.files && input.files[0] ){
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#output_image').attr('src',e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#input_image").change(function () {
        readUrl(this);
    });
</script>
<!-- bootstrap js

============================================ -->
<script src="{{asset('themes_template/js/bootstrap.min.js')}}"></script>

<!-- Nivo slider js
============================================ -->
<script src="{{asset('themes_template/custom-slider/js/jquery.nivo.slider.js')}}" type="text/javascript"></script>
<script src="{{asset('themes_template/custom-slider/home.js')}}" type="text/javascript"></script>

<!-- owl.carousel.min js
============================================ -->
<script src="{{asset('themes_template/js/owl.carousel.min.js')}}"></script>

<!-- jquery scrollUp js
============================================ -->
<script src="{{asset('themes_template/js/jquery.scrollUp.min.js')}}"></script>

<!-- price-slider js
============================================ -->
<script src="{{asset('themes_template/js/price-slider.js')}}"></script>

<!-- elevateZoom js
============================================ -->
<script src="{{asset('themes_template/js/jquery.elevateZoom-3.0.8.min.js')}}"></script>

<!-- jquery.bxslider.min.js
============================================ -->
<script src="{{asset('themes_template/js/jquery.bxslider.min.js')}}"></script>

<!-- mobile menu js
============================================ -->
<script src="{{asset('themes_template/js/jquery.meanmenu.js')}}"></script>

<!-- wow js

============================================ -->
<script src="{{asset('themes_template/js/wow.js')}}"></script>

<!-- plugins js
============================================ -->
<script src="{{asset('themes_template/js/plugins.js')}}"></script>

<!-- main js
============================================ -->
<script src="{{asset('themes_template/js/main.js')}}"></script>
@yield('script')
</body>
</html>
