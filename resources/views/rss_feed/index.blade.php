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
                            <li class="category3"><span>Tin tức</span></li>
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
                            <h4 class="pull-left">Tin tức mới<a href="#"><i class="fa fa-rss"></i></a></h4>
                        </div><!-- end blog-top -->

                        <div class="blog-list clearfix">
                            <?php $i =1?>
                            @if(isset($articlesrss))
                                @foreach($articlesrss->item as $article)

{{--                                    {{dd(array_slice(explode('</br>', $article->description), 0, 2000)[1]) }}--}}
{{--                                {{dd(strlen(explode(' ',implode(' ',array_slice(explode('</br>', $article->description), 0,1)))[2]))}}--}}
                                    <div class="blog-box row">
                                        <div class="col-md-4">
                                            <div class="post-media">
                                                <a href="{{$article->link}}" title="{{$article->title}}" target="_blank">
                                                    <div class="hovereffect">
{{--                                                        <img {!! explode(' ',implode(' ',array_slice(explode(' ', $article->description), 0, 2000)))[2] !!} alt="{{$article->a_avatar}}" class="img-fluid">--}}
                                                        <img {!! strlen(explode(' ',implode(' ',array_slice(explode('</br>', $article->description), 0,1)))[2]) > 20 ? explode(' ',implode(' ',array_slice(explode('</br>', $article->description), 0,1)))[2] : 'src="image/no_image.png"' !!} alt="{{$article->title}}" class="img-fluid">
{{--                                                        {!!implode(' ',array_slice(explode(' ', $article->description), 0, 200)) !!}--}}
                                                    </div>
                                                </a>
                                            </div><!-- end media -->
                                        </div><!-- end col -->

                                        <div class="blog-meta big-meta col-md-8">
                                            <h4><a href="{{$article->link}}" title="{{$article->title}}" target="_blank">{{$article->title}}</a></h4>
                                            <p><a class="bg-orange" href="" title="">{!!  strlen(explode(' ',implode(' ',array_slice(explode('</br>', $article->description), 0,1)))[2]) > 20 ? implode(' ',array_slice(explode('</br>', $article->description), 1)) : implode(' ',array_slice(explode('</br>', $article->description), 0))!!}</a></p>
                                            <small><a href="{{$article->link}}" title="{{$article->title}}" target="_blank">{{\Carbon\Carbon::parse($article->pubDate)->diffForHumans()}}</a></small>
                                            <small><a href="{{$articlesrss->image->link }}" target="_blank">Nguồn {{$articlesrss->generator}}</a></small>
                                        </div><!-- end meta -->
                                        <div class="blog-meta big-meta col-md-8">

                                            <div><a class="btn btn-danger" href="{{$article->link}}" title="{{$article->title}}" target="_blank">Đọc thêm</a></div>
                                        </div><!-- end meta -->
                                    </div><!-- end blog-box -->
                                    <hr class="invis">
                                        @if ($i >= 10)
                                            @break
                                        @endif
                                        <?php $i++?>
                                @endforeach
                            @endif
                        </div><!-- end blog-list -->
                    </div><!-- end page-wrapper -->

{{--                    <hr class="invis">--}}

                    <div class="row">
                        <div class="col-md-12">
                            <nav aria-label="Page navigation">
                                {{--                                @if(isset($productsCate))--}}
                                {{--                                    {{ $productsCate->appends(Request::all())->links('vendor.pagination.default') }}--}}
                                {{--                                @endif--}}
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
                                    <?php $i =1?>
                                    @if(isset($articlesrss_hots))
                                        @foreach($articlesrss_hots->item as $aHot)
                                            <a href="{{$aHot->link}}" target="_blank" class="list-group-item list-group-item-action flex-column align-items-start">
                                                <div class="w-100 justify-content-between">
                                                    <img {!! strlen(explode(' ',implode(' ',array_slice(explode('</br>', $aHot->description), 0,1)))[2]) > 20 ? explode(' ',implode(' ',array_slice(explode('</br>', $aHot->description), 0,1)))[2] : 'src="image/no_image.png"' !!} alt="{{$aHot->title}}" class="img-fluid float-left" style="margin: 0 0 25px;">
                                                    <h5 class="mb-1" >{{$aHot->title}}.</h5>
                                                    <small>{{\Carbon\Carbon::parse($aHot->pubDate)->diffForHumans()}}</small>
                                                </div>
                                            </a>
                                                @if ($i >= 3)
                                                    @break
                                                @endif
                                                <?php $i++?>
                                        @endforeach
                                    @endif
                                </div>
                            </div><!-- end blog-list -->
                        </div><!-- end widget -->
                        <div class="widget">
                            <h3 class="widget-title">Tin thế giới</h3>
                            <div class="blog-list-widget">
                                <div class="list-group">
                                    <?php $i =1?>
                                    @if(isset($articlesrss_worlds))
                                        @foreach($articlesrss_worlds->item as $aHot)
                                            <a href="{{$aHot->link}}" target="_blank" class="list-group-item list-group-item-action flex-column align-items-start">
                                                <div class="w-100 justify-content-between">
                                                    <img {!! strlen(explode(' ',implode(' ',array_slice(explode('</br>', $aHot->description), 0,1)))[2]) > 20 ? explode(' ',implode(' ',array_slice(explode('</br>', $aHot->description), 0,1)))[2] : 'src="image/no_image.png"' !!} alt="{{$aHot->title}}" class="img-fluid float-left" style="margin: 0 0 25px;">
                                                    <h5 class="mb-1" >{{$aHot->title}}.</h5>
                                                    <small>{{\Carbon\Carbon::parse($aHot->pubDate)->diffForHumans()}}</small>
                                                </div>
                                            </a>
                                            @if ($i >= 4)
                                                @break
                                            @endif
                                            <?php $i++?>
                                        @endforeach
                                    @endif
                                </div>
                            </div><!-- end blog-list -->
                        </div>

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

                        <div class="widget" style="margin-top: 60px;">
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
