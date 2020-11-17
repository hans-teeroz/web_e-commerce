@extends('layouts.app')
@section('content')
    <!-- breadcrumbs area start -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="{{route('home')}}">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Bài viết</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- shop-with-sidebar Start -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="blog-top clearfix">
                            <h4 class="pull-left">Bài viết mới<a href="#"><i class="fa fa-rss"></i></a></h4>
                        </div><!-- end blog-top -->

                        <div class="blog-list clearfix">
                            @if(isset($articles))
                                @foreach($articles as $article)
                                    <div class="blog-box row">
                                        <div class="col-md-4">
                                            <div class="post-media">
                                                <a href="{{route('get.detail.article', [$article->a_slug])}}" title="{{$article->a_name}}">
                                                    <img src="{{pare_url_file($article->a_avatar)}}" alt="{{$article->a_avatar}}" class="img-fluid">
                                                    <div class="hovereffect"></div>
                                                </a>
                                            </div><!-- end media -->
                                        </div><!-- end col -->

                                        <div class="blog-meta big-meta col-md-8">
                                            <h4><a href="{{route('get.detail.article', [$article->a_slug])}}" title="{{$article->a_name}}">{{$article->a_name}}</a></h4>
                                            <p>{{$article->a_description}}</p>
{{--                                            <small class="firstsmall"><a class="bg-orange" href="#" title="">{{$cateProduct->c_name}}</a></small>--}}
                                            <small><a href="{{route('get.detail.article', [$article->a_slug])}}" title="{{$article->a_name}}">{{\Carbon\Carbon::parse($article->created_at)->diffForHumans()}}</a></small>
                                            <small><a href="{{route('get.detail.article', [$article->a_slug])}}" title="{{$article->a_name}}">by Matilda</a></small>
                                            <small><a href="{{route('get.detail.article', [$article->a_slug])}}" title="{{$article->a_name}}"><i class="fa fa-eye"></i>{{$article->a_view}}</a></small>
                                        </div><!-- end meta -->
                                    </div><!-- end blog-box -->
                                    <hr class="invis">
                                @endforeach
                            @endif
                        </div><!-- end blog-list -->
                    </div><!-- end page-wrapper -->

                    <hr class="invis">

                    <div class="row">
                        <div class="col-md-12">
                            <nav aria-label="Page navigation">
                                @if(isset($articles))
                                    {{ $articles->appends(Request::all())->links('vendor.pagination.default') }}
                                @endif
                            </nav>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end col -->

                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <div class="sidebar">
                        <div class="widget">
                            <div class="banner-spot clearfix">
                                <div class="banner-img">
                                    <img src="" alt="" class="img-fluid">
                                </div><!-- end banner-img -->
                            </div><!-- end banner -->
                        </div><!-- end widget -->



                        <div class="widget">
                            <h3 class="widget-title">Bài viết nổi bật</h3>
                            <div class="blog-list-widget">
                                <div class="list-group">
                                    @if(isset($articlesHot))
                                        @foreach($articlesHot as $aHot)
                                            <a href="{{route('get.detail.article', [$aHot->a_slug])}}" class="list-group-item list-group-item-action flex-column align-items-start">
                                                <div class="w-100 justify-content-between">
                                                    <img src="{{pare_url_file($aHot->a_avatar)}}" alt="{{$aHot->a_avatar}}" class="img-fluid float-left" style="margin: 0 0 25px;">
                                                    <h5 class="mb-1" >{{$aHot->a_name}}.</h5>
                                                    <small>{{\Carbon\Carbon::parse($aHot->created_at)->diffForHumans()}}</small>
                                                </div>
                                            </a>
                                        @endforeach
                                    @endif
                                </div>
                            </div><!-- end blog-list -->
                        </div><!-- end widget -->

{{--                        <div class="widget">--}}
{{--                            <h2 class="widget-title">Recent Reviews</h2>--}}
{{--                            <div class="blog-list-widget">--}}
{{--                                <div class="list-group">--}}
{{--                                    <a href="tech-single.html" class="list-group-item list-group-item-action flex-column align-items-start">--}}
{{--                                        <div class="w-100 justify-content-between">--}}
{{--                                            <img src="" alt="" class="img-fluid float-left">--}}
{{--                                            <h5 class="mb-1">Banana-chip chocolate cake recipe..</h5>--}}
{{--                                            <span class="rating">--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                </span>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}

{{--                                    <a href="tech-single.html" class="list-group-item list-group-item-action flex-column align-items-start">--}}
{{--                                        <div class="w-100 justify-content-between">--}}
{{--                                            <img src="" alt="" class="img-fluid float-left">--}}
{{--                                            <h5 class="mb-1">10 practical ways to choose organic..</h5>--}}
{{--                                            <span class="rating">--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                </span>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}

{{--                                    <a href="tech-single.html" class="list-group-item list-group-item-action flex-column align-items-start">--}}
{{--                                        <div class="w-100 last-item justify-content-between">--}}
{{--                                            <img src="" alt="" class="img-fluid float-left">--}}
{{--                                            <h5 class="mb-1">We are making homemade ravioli..</h5>--}}
{{--                                            <span class="rating">--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                    <i class="fa fa-star"></i>--}}
{{--                                                </span>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div><!-- end blog-list -->--}}
{{--                        </div><!-- end widget -->--}}

                        <div class="widget">
                            <h2 class="widget-title">Follow Us</h2>

                            <div class="row text-center">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <a href="#" class="social-button facebook-button">
                                        <i class="fa fa-facebook"></i>
                                        <p>27k</p>
                                    </a>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <a href="#" class="social-button twitter-button">
                                        <i class="fa fa-twitter"></i>
                                        <p>98k</p>
                                    </a>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <a href="#" class="social-button google-button">
                                        <i class="fa fa-google-plus"></i>
                                        <p>17k</p>
                                    </a>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <a href="#" class="social-button youtube-button">
                                        <i class="fa fa-youtube"></i>
                                        <p>22k</p>
                                    </a>
                                </div>
                            </div>
                        </div><!-- end widget -->

                        <div class="widget">
                            <div class="banner-spot clearfix">
                                <div class="banner-img">
                                    <img src="{{asset('tech-blogs/upload/banner_03.jpg')}}" alt="" class="img-fluid">
                                </div><!-- end banner-img -->
                            </div><!-- end banner -->
                        </div><!-- end widget -->
                    </div><!-- end sidebar -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- shop-with-sidebar end -->
    <!-- Brand Logo Area Start -->
@stop
