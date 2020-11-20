@extends('layouts.app')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .sidebar-content .active
        {
            color: #e6193c;
        }
    </style>
    <!-- category-banner area start -->
    {{--    <div class="category-banner">--}}
    {{--        <div class="cat-heading">--}}
    {{--            <span>Women</span>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <!-- category-banner area end -->
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
                            @if(isset($cateProduct->c_name))
                                <li class="category3"><span>{{ $cateProduct->c_name }}</span></li>
                            @else
                                <li class="category3"><span>Sản phẩm</span></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- shop-with-sidebar Start -->
    <div class="shop-with-sidebar">
        <div class="container">
            <div class="row">
                <!-- left sidebar start -->
                <div class="col-md-3 col-sm-12 col-xs-12 text-left">
                    <div class="topbar-left">
                        <aside class="widge-topbar">
                            <div class="bar-title">
                                <div class="bar-ping"><img src="{{asset('themes_template/img/bar-ping.png')}}" alt=""></div>
                                <h2>Lọc sản phẩm</h2>
                            </div>
                        </aside>
                        {{--                        <aside class="sidebar-content">--}}
                        {{--                            <div class="sidebar-title">--}}
                        {{--                                <h6>Categories</h6>--}}
                        {{--                            </div>--}}
                        {{--                            <ul class="sidebar-tags">--}}
                        {{--                                <li><a href="#">Acsessories</a><span> (14)</span></li>--}}
                        {{--                                <li><a href="#">Afternoon</a><span> (14)</span></li>--}}
                        {{--                                <li><a href="#">Attachment</a><span> (14)</span></li>--}}
                        {{--                                <li><a href="#">Beauty</a><span> (14)</span></li>--}}
                        {{--                            </ul>--}}
                        {{--                        </aside>--}}
                        <aside class="sidebar-content">
                            <div class="sidebar-title">
                                <h6>Khoảng giá</h6>
                            </div>
                            <ul>
                                <li><a class="{{Request::get('price') == 1 ? 'active' : ''}}" href="{{request()->fullUrlWithQuery(['price' => 1])}}">Dưới 1.000.000 VNĐ</a></li>
                                <li><a class="{{Request::get('price') == 2 ? 'active' : ''}}" href="{{request()->fullUrlWithQuery(['price' => 2])}}">1.000.000 - 5.000.000 VNĐ</a></li>
                                <li><a class="{{Request::get('price') == 3 ? 'active' : ''}}" href="{{request()->fullUrlWithQuery(['price' => 3])}}">5.000.000 - 9.000.000 VNĐ</a></li>
                                <li><a class="{{Request::get('price') == 4 ? 'active' : ''}}" href="{{request()->fullUrlWithQuery(['price' => 4])}}">9.000.000 - 15.000.000 VNĐ</a></li>
                                <li><a class="{{Request::get('price') == 5 ? 'active' : ''}}" href="{{request()->fullUrlWithQuery(['price' => 5])}}">15.000.000 - 20.000.000 VNĐ</a></li>
                                <li><a class="{{Request::get('price') == 6 ? 'active' : ''}}" href="{{request()->fullUrlWithQuery(['price' => 6])}}">Trên 20.000.000 VNĐ</a></li>
                            </ul>
                        </aside>
                        {{--                        <aside class="topbarr-category sidebar-content">--}}
                        {{--                            <div class="tpbr-title sidebar-title col-md-12 nopadding">--}}
                        {{--                                <h6>Filter by price</h6>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="tpbr-menu col-md-12 nopadding">--}}
                        {{--                                <!-- shop-filter start -->--}}
                        {{--                                <div class="price-bar">--}}
                        {{--                                    <div class="info_widget">--}}
                        {{--                                        <div class="price_filter">--}}
                        {{--                                            <div id="slider-range"></div>--}}
                        {{--                                            <div class="price_slider_amount">--}}
                        {{--                                                <input type="submit" class="filter-price" value="Filter"/>--}}
                        {{--                                                <div class="filter-ranger">--}}
                        {{--                                                    <h6>Price:</h6>--}}
                        {{--                                                    <input type="text" id="amount" name="price" placeholder="Add Your Price" />--}}
                        {{--                                                </div>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                                <!-- shop-filter end -->--}}
                        {{--                            </div>--}}
                        {{--                        </aside>--}}
                        {{--                        <aside class="sidebar-content">--}}
                        {{--                            <div class="sidebar-title">--}}
                        {{--                                <h6>Size</h6>--}}
                        {{--                            </div>--}}
                        {{--                            <ul>--}}
                        {{--                                <li><a href="#">S</a><span> (18)</span></li>--}}
                        {{--                                <li><a href="#">M</a><span> (24)</span></li>--}}
                        {{--                                <li><a href="#">L</a><span> (21)</span></li>--}}
                        {{--                            </ul>--}}
                        {{--                        </aside>--}}
                        {{--                        <aside class="sidebar-content">--}}
                        {{--                            <div class="sidebar-title">--}}
                        {{--                                <h6>Color</h6>--}}
                        {{--                            </div>--}}
                        {{--                            <ul>--}}
                        {{--                                <li><a href="#">Beige</a><span> (1)</span></li>--}}
                        {{--                                <li><a href="#">White</a><span> (2)</span></li>--}}
                        {{--                                <li><a href="#">Orange</a><span> (2)</span></li>--}}
                        {{--                                <li><a href="#">Black</a><span> (2)</span></li>--}}
                        {{--                                <li><a href="#">Blue</a><span> (2)</span></li>--}}
                        {{--                                <li><a href="#">Green</a><span> (2)</span></li>--}}
                        {{--                                <li><a href="#">Yellow</a><span> (2)</span></li>--}}
                        {{--                                <li><a href="#">Pink</a><span> (2)</span></li>--}}
                        {{--                            </ul>--}}
                        {{--                        </aside>--}}
                        {{--                        <aside class="sidebar-content">--}}
                        {{--                            <div class="sidebar-title">--}}
                        {{--                                <h6>Composition</h6>--}}
                        {{--                            </div>--}}
                        {{--                            <ul>--}}
                        {{--                                <li><a href="#">Cotton</a><span> (3)</span></li>--}}
                        {{--                                <li><a href="#">Polyester</a><span> (9)</span></li>--}}
                        {{--                                <li><a href="#">Viscose</a><span> (9)</span></li>--}}
                        {{--                            </ul>--}}
                        {{--                        </aside>--}}
                        {{--                        <aside class="sidebar-content">--}}
                        {{--                            <div class="sidebar-title">--}}
                        {{--                                <h6>Styles</h6>--}}
                        {{--                            </div>--}}
                        {{--                            <ul>--}}
                        {{--                                <li><a href="#">Casual</a><span> (1)</span></li>--}}
                        {{--                                <li><a href="#">Dressy</a><span> (2)</span></li>--}}
                        {{--                                <li><a href="#">Girly</a><span> (2)</span></li>--}}
                        {{--                            </ul>--}}
                        {{--                        </aside>--}}
                        {{--                        <aside class="sidebar-content">--}}
                        {{--                            <div class="sidebar-title">--}}
                        {{--                                <h6>Properties</h6>--}}
                        {{--                            </div>--}}
                        {{--                            <ul>--}}
                        {{--                                <li><a href="#">Colorful Dress</a><span> (1)</span></li>--}}
                        {{--                                <li><a href="#">Maxi Dress</a><span> (2)</span></li>--}}
                        {{--                                <li><a href="#">Midi Dress</a><span> (2)</span></li>--}}
                        {{--                                <li><a href="#">Short Dress</a><span> (2)</span></li>--}}
                        {{--                                <li><a href="#">Short Sleeve</a><span> (2)</span></li>--}}
                        {{--                            </ul>--}}
                        {{--                        </aside>--}}
                        <aside class="widge-topbar">
                            <div class="bar-title">
                                <div class="bar-ping"><img src="{{asset('themes_template/img/bar-ping.png')}}" alt=""></div>
                                <h2>Popular Tags</h2>
                            </div>
                            <div class="exp-tags">
                                <div class="tags">
                                    <a href="#">camera</a>
                                    <a href="#">mobile</a>
                                    <a href="#">electronic</a>
                                    <a href="#">destop</a>
                                    <a href="#">tablet</a>
                                    <a href="#">accessories</a>
                                    <a href="#">camcorder</a>
                                    <a href="#">laptop</a>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
                <!-- left sidebar end -->
                <!-- right sidebar start -->
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <!-- shop toolbar start -->
{{--                    <div class="shop-content-area">--}}
{{--                        <div class="shop-toolbar">--}}
{{--                            <div class="col-md-4 col-sm-4 col-xs-12 nopadding-left text-left">--}}
{{--                                <form class="tree-most" id="form_oder" method="get">--}}
{{--                                    <div class="orderby-wrapper">--}}
{{--                                        <label>Sắp xếp</label>--}}
{{--                                        <select name="orderby" class="orderby">--}}
{{--                                            <option {{Request::get('orderby') == "md" || !Request::get('orderby') ? "selected=selected" : ""}} value="md" >Mặc định</option>--}}
{{--                                            <option {{Request::get('orderby') == "new" ? "selected=selected" : ""}} value="new">Sản phẩm mới</option>--}}
{{--                                            <option {{Request::get('orderby') == "sale" ? "selected=selected" : ""}} value="sale">Sản phẩm Sale</option>--}}
{{--                                            <option {{Request::get('orderby') == "hot" ? "selected=selected" : ""}} value="hot">Bán chạy nhất</option>--}}
{{--                                            <option {{Request::get('orderby') == "price_max" ? "selected=selected" : ""}} value="price_max">Giá tăng dần</option>--}}
{{--                                            <option {{Request::get('orderby') == "price_min" ? "selected=selected" : ""}} value="price_min">Giá gảm dần</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                            --}}{{--                            <div class="col-md-4 col-sm-4 none-xs text-center">--}}
{{--                            --}}{{--                                <div class="limiter hidden-xs">--}}
{{--                            --}}{{--                                    <label>Show</label>--}}
{{--                            --}}{{--                                    <select>--}}
{{--                            --}}{{--                                        <option selected="selected" value="">9</option>--}}
{{--                            --}}{{--                                        <option value="">12</option>--}}
{{--                            --}}{{--                                        <option value="">24</option>--}}
{{--                            --}}{{--                                        <option value="">36</option>--}}
{{--                            --}}{{--                                    </select>--}}
{{--                            --}}{{--                                    per page--}}
{{--                            --}}{{--                                </div>--}}
{{--                            --}}{{--                            </div>--}}
{{--                            --}}{{--                            <div class="col-md-4 col-sm-4 col-xs-12 nopadding-right text-right">--}}
{{--                            --}}{{--                                <div class="view-mode">--}}
{{--                            --}}{{--                                    <label>View on</label>--}}
{{--                            --}}{{--                                    <ul>--}}
{{--                            --}}{{--                                        <li class="active"><a href="#shop-grid-tab" data-toggle="tab"><i class="fa fa-th"></i></a></li>--}}
{{--                            --}}{{--                                        <li class=""><a href="#shop-list-tab" data-toggle="tab" ><i class="fa fa-th-list"></i></a></li>--}}
{{--                            --}}{{--                                    </ul>--}}
{{--                            --}}{{--                                </div>--}}
{{--                            --}}{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <!-- shop toolbar end -->
                    <!-- product-row start -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="shop-grid-tab">
                            <div class="row">
                                <div class="shop-product-tab first-sale">
                                    @if(isset($products))
                                        {{--                                        {{dd($products->total())}}--}}
                                        {{--                                        @if($products->total() == 0)--}}
                                        {{--                                            <h3>Không có sản phẩm nào phù hợp với mức giá</h3>--}}
                                        {{--                                        @endif--}}
                                    @endif
                                    @if(isset($products))
                                        @foreach($products as $product)
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <div class="two-product">
                                                    <!-- single-product start -->
                                                    <div class="single-product">
                                                        <div class="product-img">
                                                            @if($product->pro_number <1)
                                                                <span style="position: absolute; left: 40px; background: #e6193c; color: white; padding: 2px 6px; border-radius: 5px; font-size: 10px">Tạm hết hàng</span>
                                                            @endif
                                                            @if($product->pro_sale > 0)
                                                                <span style="display: inline-block;position: absolute;right: 40px;font-size: 11px;color: #fff;font-weight: 600;background: #3fb846;border-radius: 2px;padding: 0 5px;height: 18px;">-{{$product->pro_sale}}%</span>
                                                            @endif
                                                            <a href="{{route('get.detail.product', [$product->pro_slug])}}">
                                                                <img class="primary-image" src="{{pare_url_file($product->pro_avatar)}}" alt="" />
                                                                <img class="secondary-image" src="{{pare_url_file($product->pro_avatar)}}" alt="" />
                                                            </a>
                                                            <div class="action-zoom">
                                                                <div class="add-to-cart">
                                                                    <a href="{{route('add.shopping.cart',$product->id)}}" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="actions">
                                                                <div class="action-buttons">
                                                                    <div class="add-to-links">
                                                                        <div class="add-to-wishlist">
                                                                            <a href="{{route('post.form.wishlist', [$product->id])}}" title="Add to Wishlist" class="{{get_data_user('web') ? 'js-wish-list' : 'js-show-login'}}"><i class="fa fa-heart"></i></a>
                                                                        </div>
                                                                        <div class="compare-button">
                                                                            <a href="{{route('add.shopping.cart',$product->id)}}" title="Thêm vào giỏ hàng"><i class="icon-bag"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="quickviewbtn">
                                                                        <a href="{{route('get.detail.product', [$product->pro_slug])}}" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="price-box">
                                                                <span class="new-price" style="{{$product->pro_sale > 0 ?  'text-decoration: line-through' : ''}}">{{number_format($product->pro_price)}} VNĐ</span>
                                                                <br>
                                                                @if(isset($product->pro_sale) && $product->pro_sale > 0)
                                                                    <span class="new-price" style="color: red">Sale: {{number_format(($product->pro_price-($product->pro_price*$product->pro_sale)/100))}} VNĐ</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="product-content">
                                                            <h2 class="product-name"><a href="{{route('get.detail.product', [$product->pro_slug])}}">{{$product->pro_name}}</a></h2>
                                                            <p>{{$product->pro_description}}</p>
                                                        </div>
                                                    </div>
                                                    <!-- single-product end -->
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <!-- product-row end -->
                            @if(isset($products))
                                {{ $products->appends(Request::all())->links('vendor.pagination.default') }}
                            @endif
                        </div>
                        <!-- list view -->
                        {{--                        <div class="tab-pane fade" id="shop-list-tab">--}}
                        {{--                            <div class="list-view">--}}
                        {{--                                <!-- single-product start -->--}}
                        {{--                                @if(isset($products))--}}

                        {{--                                    @if($products->total()==0)--}}
                        {{--                                        <h3>Không có sản phẩm nào phù hợp với mức giá</h3>--}}
                        {{--                                    @endif--}}
                        {{--                                @endif--}}
                        {{--                                @if(isset($products))--}}
                        {{--                                    @foreach($products as $product)--}}
                        {{--                                        <div class="product-list-wrapper">--}}
                        {{--                                            <div class="single-product">--}}
                        {{--                                                <div class="col-md-4 col-sm-4 col-xs-12">--}}
                        {{--                                                    <div class="product-img">--}}
                        {{--                                                        @if($product->pro_number <1)--}}
                        {{--                                                            <span style="position: absolute; left: 40px; background: #e6193c; color: white; padding: 2px 6px; border-radius: 5px; font-size: 10px">Tạm hết hàng</span>--}}
                        {{--                                                        @endif--}}
                        {{--                                                        @if($product->pro_sale > 0)--}}
                        {{--                                                            <span style="display: inline-block;position: absolute;right: 40px;font-size: 11px;color: #fff;font-weight: 600;background: #3fb846;border-radius: 2px;padding: 0 5px;height: 18px;">-{{$product->pro_sale}}%</span>--}}
                        {{--                                                        @endif--}}
                        {{--                                                        <a href="{{route('get.detail.product', [$product->pro_slug,$product->id])}}">--}}
                        {{--                                                            <img class="primary-image" src="{{pare_url_file($product->pro_avatar)}}" alt="" />--}}
                        {{--                                                            <img class="secondary-image" src="{{pare_url_file($product->pro_avatar)}}" alt="" />--}}
                        {{--                                                        </a>--}}
                        {{--                                                    </div>--}}
                        {{--                                                </div>--}}
                        {{--                                                <div class="col-md-8 col-sm-8 col-xs-12">--}}
                        {{--                                                    <div class="product-content">--}}
                        {{--                                                        <h2 class="product-name"><a href="{{route('get.detail.product', [$product->pro_slug,$product->id])}}">{{$product->pro_name}}</a></h2>--}}
                        {{--                                                        <div class="rating-price">--}}
                        {{--                                                            <div class="pro-rating">--}}
                        {{--                                                                <a href="#"><i class="fa fa-star"></i></a>--}}
                        {{--                                                                <a href="#"><i class="fa fa-star"></i></a>--}}
                        {{--                                                                <a href="#"><i class="fa fa-star"></i></a>--}}
                        {{--                                                                <a href="#"><i class="fa fa-star"></i></a>--}}
                        {{--                                                                <a href="#"><i class="fa fa-star"></i></a>--}}
                        {{--                                                            </div>--}}
                        {{--                                                            <div class="price-boxes">--}}
                        {{--                                                                <span class="new-price" style="{{$product->pro_sale > 0 ?  'text-decoration: line-through' : ''}}">{{number_format($product->pro_price)}} VNĐ</span>--}}
                        {{--                                                                <br>--}}
                        {{--                                                                @if(isset($product->pro_sale) && $product->pro_sale > 0)--}}
                        {{--                                                                    <span class="new-price" style="color: red">Sale: {{number_format(($product->pro_price-($product->pro_price*$product->pro_sale)/100))}} VNĐ</span>--}}
                        {{--                                                                @endif--}}
                        {{--                                                            </div>--}}
                        {{--                                                        </div>--}}
                        {{--                                                        <div class="product-desc">--}}
                        {{--                                                            <p>{{$product->pro_description}}</p>--}}
                        {{--                                                        </div>--}}
                        {{--                                                        <div class="actions-e">--}}
                        {{--                                                            <div class="action-buttons">--}}
                        {{--                                                                <div class="add-to-cart">--}}
                        {{--                                                                    <a href="{{route('add.shopping.cart',$product->id)}}">Thêm vào giỏ hàng</a>--}}
                        {{--                                                                </div>--}}
                        {{--                                                                <div class="add-to-links">--}}
                        {{--                                                                    <div class="add-to-wishlist">--}}
                        {{--                                                                        <a href="{{route('get.detail.product', [$product->pro_slug,$product->id])}}" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>--}}
                        {{--                                                                    </div>--}}
                        {{--                                                                    <div class="compare-button">--}}
                        {{--                                                                        <a href="{{route('get.detail.product', [$product->pro_slug,$product->id])}}" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>--}}
                        {{--                                                                    </div>--}}
                        {{--                                                                </div>--}}
                        {{--                                                            </div>--}}
                        {{--                                                        </div>--}}
                        {{--                                                    </div>--}}
                        {{--                                                </div>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    @endforeach--}}
                        {{--                                @endif--}}

                        {{--                                <!-- single-product end -->--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                    </div>
                </div>
                <!-- right sidebar end -->
            </div>
        </div>
    </div>
    <!-- shop-with-sidebar end -->
    <!-- Brand Logo Area Start -->

@stop
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // $(function () {
        //     $('.orderby').change(function () {
        //         $("#form_oder").submit();
        //
        //     })
        // })

        $(function () {
            $(".js-wish-list").click(function (event) {
                event.preventDefault();
                let $this = $(this);
                let url = $this.attr('href');
                if (url){
                    $.ajax({
                        method: "POST",
                        url : url
                    }).done(function (result) {
                        alert(result.msg);
                    })
                }
            })
            $(".js-show-login").click(function (event) {
                event.preventDefault();
                alert("Bạn cần đăng nhập để sử dụng chức năng này");
            })
        })
    </script>
@stop
