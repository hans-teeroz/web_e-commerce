@if(!empty($listProductssuggest))
    <div class="container">
        <div class="area-title">
            <h2>Sản phẩm gợi ý</h2>
        </div>
        <!-- our-product area start -->
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="features-curosel">
                        <!-- single-product start -->
                            @foreach($listProductssuggest as $product)
                                <div class="col-lg-12 col-md-12">
                                    <div class="single-product first-sale">
                                        <div class="product-img">
                                            @if($product->pro_number <1)
                                                <span style="position: absolute; left: 40px; background: #e6193c; color: white; padding: 2px 6px; border-radius: 5px; font-size: 10px">Tạm hết hàng</span>
                                            @endif
                                            @if($product->pro_sale > 0)
                                                <span style="display: inline-block;position: absolute;right: 40px;font-size: 11px;color: #fff;font-weight: 600;background: #3fb846;border-radius: 2px;padding: 0 5px;height: 18px;">-{{$product->pro_sale}}%</span>
                                            @endif
                                            <a href="{{route('get.detail.product', [$product->pro_slug])}}">
                                                <img class="primary-image" src="{{pare_url_file($product->pro_avatar)}}" width="540px" height="600px"  alt="" />
                                                <img class="secondary-image" src="{{pare_url_file($product->pro_avatar)}}" width="540px" height="600px" alt="" />
                                            </a>
                                            <div class="action-zoom">
                                                <div class="add-to-cart">
                                                    <a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="actions">
                                                <div class="action-buttons">
                                                    <div class="add-to-links">
                                                        <div class="add-to-wishlist">
                                                            <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                        </div>
                                                        <div class="compare-button">
                                                            <a href="{{route('add.shopping.cart',$product->id)}}" title="Add to Cart"><i class="icon-bag"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="quickviewbtn">
                                                        <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-box">
                                                <span class="new-price">{{number_format(($product->pro_price-($product->pro_price*$product->pro_sale)/100))}} VNĐ</span>
                                            </div>
                                            {{--                                                    <div class="price-box">--}}
                                            {{--                                                        <span class="new-price">{{number_format($product->pro_price)}} VNĐ</span>--}}
                                            {{--                                                    </div>--}}
                                        </div>
                                        <div class="product-content">
                                            <h2 class="product-name"><a href="{{route('get.detail.product', [$product->pro_slug])}}">{{$product->pro_name}}</a></h2>
                                            <p>{{$product->pro_description}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        <!-- single-product end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- our-product area end -->
    </div>


@endif

