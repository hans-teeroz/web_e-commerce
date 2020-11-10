@extends('layouts.app')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="index.html">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="home">
                                <a href="#"> {{$productsDetail->category->c_name}} </a>
                                <span><i class="fa fa-angle-right">  </i></span>
                                <span> {{ $productsDetail->pro_name }} </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- product-details Area Start -->
    <div class="product-details-area" id="content_product" data-id="{{$productsDetail->id}}">
        <div class="container">
            @if(isset($productsDetail))
                <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="zoomWrapper">
                            <div id="img-1" class="zoomWrapper single-zoom">
                                <a href="#">
                                    <img id="zoom1" src="{{pare_url_file($productsDetail->pro_avatar)}}" data-zoom-image="{{pare_url_file($productsDetail->pro_avatar)}}" alt="big-1">
                                </a>
                            </div>
                            <div class="single-zoom-thumb">
                                <ul class="bxslider" id="gallery_01">
                                    <li>
                                        <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{asset('themes_template/img/product-details/big-1-1.jpg')}}" data-zoom-image="{{asset('themes_template/img/product-details/ex-big-1-1.jpg')}}"><img src="{{asset('themes_template/img/product-details/th-1-1.jpg')}}" alt="zo-th-1" /></a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="elevatezoom-gallery" data-image="{{asset('themes_template/img/product-details/big-1-2.jpg')}}" data-zoom-image="{{asset('themes_template/img/product-details/ex-big-1-2.jpg')}}"><img src="{{asset('themes_template/img/product-details/th-1-2.jpg')}}" alt="zo-th-2"></a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="elevatezoom-gallery" data-image="{{asset('themes_template/img/product-details/big-1-3.jpg')}}" data-zoom-image="{{asset('themes_template/img/product-details/ex-big-1-3.jpg')}}"><img src="{{asset('themes_template/img/product-details/th-1-3.jpg')}}" alt="ex-big-3" /></a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="elevatezoom-gallery" data-image="{{asset('themes_template/img/product-details/big-4.jpg')}}" data-zoom-image="{{asset('themes_template/img/product-details/ex-big-4.jpg')}}"><img src="{{asset('themes_template/img/product-details/th-4.jpg')}}" alt="zo-th-4"></a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="elevatezoom-gallery" data-image="{{asset('themes_template/img/product-details/big-5.jpg')}}" data-zoom-image="{{asset('themes_template/img/product-details/ex-big-5.jpg')}}"><img src="{{asset('themes_template/img/product-details/th-5.jpg')}}" alt="zo-th-5" /></a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="elevatezoom-gallery" data-image="{{asset('themes_template/img/product-details/big-6.jpg')}}" data-zoom-image="{{asset('themes_template/img/product-details/ex-big-6.jpg')}}"><img src="{{asset('themes_template/img/product-details/th-6.jpg')}}" alt="ex-big-3" /></a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="elevatezoom-gallery" data-image="{{asset('themes_template/img/product-details/big-7.jpg')}}" data-zoom-image="{{asset('themes_template/img/product-details/ex-big-7.jpg')}}"><img src="{{asset('themes_template/img/product-details/th-7.jpg')}}" alt="ex-big-3" /></a>
                                    </li>
                                    <li class="">
                                        <a href="#" class="elevatezoom-gallery" data-image="{{asset('themes_template/img/product-details/big-8.jpg')}}" data-zoom-image="{{asset('themes_template/img/product-details/ex-big-8.jpg')}}"><img src="{{asset('themes_template/img/product-details/th-8.jpg')}}" alt="ex-big-3" /></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <div class="product-list-wrapper">
                            <div class="single-product">
                                <div class="product-content">
                                    <h2 class="product-name"><a href="#">{{$productsDetail->pro_name}}</a></h2>
                                    <div class="rating-price">
                                        <div class="pro-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>
                                        <div class="price-boxes">
                                            <span class="new-price" style="{{$productsDetail->pro_sale > 0 ?  'text-decoration: line-through' : ''}}">{{number_format($productsDetail->pro_price)}} VNĐ</span>
                                            <br>
                                            @if(isset($productsDetail->pro_sale) && $productsDetail->pro_sale > 0)
                                                <span class="new-price" style="color: red">Sale: {{number_format(($productsDetail->pro_price-($productsDetail->pro_price*$productsDetail->pro_sale)/100))}} VNĐ</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-desc">
                                        <p>{{$productsDetail->pro_description}}</p>
                                    </div>
                                    <p class="availability in-stock">Trình trạng: <span>{{$productsDetail->pro_number < 1 ? 'Tạm hết hàng' : 'Còn hàng'}}</span></p>
                                    <div class="actions-e">
                                            <div class="action-buttons-single">
{{--                                                <div class="inputx-content">--}}
{{--                                                    <label for="qty">Số lượng:</label>--}}
{{--                                                    <input type="text" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty">--}}
{{--                                                </div>--}}
                                                <div class="add-to-cart">
                                                    <a href="{{route('add.shopping.cart',$productsDetail->id)}}">Thêm vào giỏ hàng</a>
                                                </div>

                                                <div class="add-to-links">
                                                    <div class="add-to-wishlist">
                                                        <a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    </div>
                                                    <div class="compare-button">
                                                        <a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="singl-share">
                                        <a href="#"><img src="{{asset('themes_template/img/single-share.png')}}" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="single-product-tab">
                        <!-- Nav tabs -->
                        <ul class="details-tab">
                            <li class="active"><a href="#home" data-toggle="tab">Description</a></li>
                            <li class=""><a href="#messages" data-toggle="tab"> Review (<span class="fb-comments-count" data-href="http://gearshopping.herokuapp.com/san-pham/{{$productsDetail->pro_slug.'-'.$productsDetail->id}}"></span>)</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <div class="product-tab-content">
                                    {!! $productsDetail->pro_content !!}
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="messages">
                                <div class="">
                                    <div id="fb-root"></div>
                                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=373939303960427&autoLogAppEvents=1" nonce="IVvASBbL"></script>
                                    <div class="fb-comments" data-href="http://gearshopping.herokuapp.com/san-pham/{{$productsDetail->pro_slug.'-'.$productsDetail->id}}" data-numposts="5" data-width="1140" data-lazy="true" data-include-parent="true"></div>
{{--                                    <div class="fb-comments" data-href="http://webshopping.com/san-pham/{{$productsDetail->pro_slug.'-'.$productsDetail->id}}" data-include-parent="true" data-width="" data-lazy="true"></div>--}}
{{--                                    <div class="fb-comment-embed" data-href="http://webshopping.com/san-pham/{{$productsDetail->pro_slug.'-'.$productsDetail->id}}" data-numposts="5" data-width=""></div>--}}
{{--                                    <div class="comments-area">--}}
{{--                                        <h3 class="comment-reply-title">1 REVIEW FOR TURPIS VELIT ALIQUET</h3>--}}
{{--                                        <div class="comments-list">--}}
{{--                                            <ul>--}}
{{--                                                <li>--}}
{{--                                                    <div class="comments-details">--}}
{{--                                                        <div class="comments-list-img">--}}
{{--                                                            <img src="{{asset('themes_template/img/user-1.jpg')}}" alt="">--}}
{{--                                                        </div>--}}
{{--                                                        <div class="comments-content-wrap">--}}
{{--															<span>--}}
{{--																<b><a href="#">Admin - </a></b>--}}
{{--																<span class="post-time">October 6, 2014 at 1:38 am</span>--}}
{{--															</span>--}}
{{--                                                            <p>Lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi.</p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="comment-respond">--}}
{{--                                        <h3 class="comment-reply-title">Add a review</h3>--}}
{{--                                        <span class="email-notes">Your email address will not be published. Required fields are marked *</span>--}}
{{--                                        <form action="#">--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-md-12">--}}
{{--                                                    <p>Name *</p>--}}
{{--                                                    <input type="text">--}}
{{--                                                </div>--}}
{{--                                                <div class="col-md-12">--}}
{{--                                                    <p>Email *</p>--}}
{{--                                                    <input type="email">--}}
{{--                                                </div>--}}
{{--                                                <div class="col-md-12">--}}
{{--                                                    <p>Your Rating</p>--}}
{{--                                                    <div class="pro-rating">--}}
{{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                                        <a href="#"><i class="fa fa-star"></i></a>--}}
{{--                                                        <a href="#"><i class="fa fa-star-o"></i></a>--}}
{{--                                                        <a href="#"><i class="fa fa-star-o"></i></a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-md-12 comment-form-comment">--}}
{{--                                                    <p>Your Review</p>--}}
{{--                                                    <textarea id="message" cols="30" rows="10"></textarea>--}}
{{--                                                    <input type="submit" value="Submit">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
    <!-- product-details Area end -->
    <!-- product section start -->
    <div class="our-product-area new-product">
        <div class="container">
            <div class="area-title">
                <h2>New products</h2>
            </div>
            <!-- our-product area start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="features-curosel">
                            @if(isset($productNew))
                                @foreach($productNew as $product)
                                    <div class="col-lg-12 col-md-12">
                                        <div class="single-product first-sale">
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
                                                                        <a href="{{route('get.detail.product', [$product->pro_slug])}}" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
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
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- our-product area end -->
        </div>
    </div>

@stop
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //Sản phẩm vừa xem
        $(function () {
            //lấy gtri trong Storage
            let products = localStorage.getItem('products');
            //Lưu id sp in Storage
            let idProduct = $("#content_product").attr('data-id');
            //console.log(idProduct);
            if (products == null)
            {
                arrayProduct = new Array();
                arrayProduct.push(idProduct)
                localStorage.setItem('products', JSON.stringify(arrayProduct))
            }
            else
            {
                //lấy gtri id đã save
                //let products = localStorage.getItem('products');
                //chuyển về mảng
                products = $.parseJSON(products)
                if(products.indexOf(idProduct) == -1) //ktra id đã save r thì ko cần thêm nữa
                {
                    products.push(idProduct);
                    localStorage.setItem('products', JSON.stringify(products))

                }
                //console.log(products);
            }
        });
    </script>
@stop
