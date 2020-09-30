<header class="short-stor">
    <div class="container-fluid">
        <div class="row">
            <!-- logo start -->
            <div class="col-md-3 col-sm-12 text-center nopadding-right">
                <div class="top-logo">
                    <a href="index.html"><img src="{{asset('themes_template/img/logo.gif')}}" alt="" /></a>
                </div>
            </div>
            <!-- logo end -->
            <!-- mainmenu area start -->
            <div class="col-md-6 text-center">
                <div class="mainmenu">
                    <nav>
                        <ul>
                            <li class="expand"><a href="{{route('home')}}">Trang chủ</a></li>
{{--                            {{dd($categories)}}--}}
                            <li class="expand"><a href="">Danh mục</a>
                                <div class="restrain mega-menu megamenu1">
                                    @if(isset($categories))
                                        @foreach($categories as $category)
                                            <span>
                                                <a class="mega-menu-title" href="{{route('get.list.product', [$category->c_slug,$category->id])}}"> {{$category->c_name}} </a>
{{--                                                <a href="shop-grid.html">Coctail</a>--}}
{{--                                                <a href="shop-grid.html">Day</a>--}}
{{--                                                <a href="shop-grid.html">Evening </a>--}}
{{--                                                <a href="shop-grid.html">Sports</a>--}}
                                            </span>
                                        @endforeach
                                    @endif

{{--
{{--                                    <span class="block-last">--}}
{{--												<img src="{{asset('themes_template/img/block_menu.jpg')}}" alt="" />--}}
{{--											</span>--}}
                                </div>
                            </li>
                            <li class="expand"><a href="shop-list.html">Women</a>
                                <div class="restrain mega-menu megamenu2">
                                    <span>
												<a class="mega-menu-title" href="shop-grid.html">Rings</a>
                                            </span>
                                    <span>
												<a class="mega-menu-title" href="shop-grid.html">Dresses</a>
												<a href="shop-grid.html">Ankle Boots</a>
												<a href="shop-grid.html">Footwear</a>
												<a href="shop-grid.html">Clog Sandals</a>
												<a href="shop-grid.html">Combat Boots</a>
											</span>
                                    <span>
												<a class="mega-menu-title" href="shop-grid.html">Accessories</a>
												<a href="shop-grid.html">Bootees bags</a>
												<a href="shop-grid.html">Blazers</a>
												<a href="shop-grid.html">Jackets</a>
												<a href="shop-grid.html">Shoes</a>
											</span>
                                    <span class="block-last">
												<a class="mega-menu-title" href="shop-grid.html">Top</a>
												<a href="shop-grid.html">Briefs</a>
												<a href="shop-grid.html">Camis</a>
												<a href="shop-grid.html">Nigntwears</a>
												<a href="shop-grid.html">Shapewears</a>
                                    </span>
                                </div>
                            </li>
                            <li class="expand"><a href="shop-grid.html">Shop</a>
                                <div class="restrain mega-menu megamenu4">
											<span>
												<a class="mega-menu-title" href="shop-list.html">Shop Pages</a>
												<a href="shop-list.html">List View </a>
												<a href="shop-grid.html">Grid View</a>
												<a href="login.html">My Account</a>
												<a href="wishlist.html">Wishlist</a>
												<a href="cart.html">Cart </a>
												<a href="checkout.html">Checkout </a>
											</span>
                                    <span class="block-last">
												<a class="mega-menu-title" href="product-details.html">Product Types</a>
												<a href="product-details.html">Simple Product</a>
												<a href="product-details.html">Variables Product</a>
												<a href="product-details.html">Grouped Product</a>
												<a href="product-details.html">Downloadable</a>
												<a href="product-details.html">Virtual Product</a>
												<a href="product-details.html">External Product</a>
											</span>
                                </div>
                            </li>
                            <li class="expand"><a href="#">Pages</a>
                                <ul class="restrain sub-menu">
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="contact-us.html">Contact Us</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="product-details.html">Product Details</a></li>
                                    <li><a href="shop-grid.html">Shop Grid</a></li>
                                    <li><a href="shop-list.html">Shop List</a></li>
                                    <li><a href="cart.html">Shopping cart</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="404.html">404 Error</a></li>
                                </ul>
                            </li>
                            <li class="expand"><a href="{{route('get.list.article')}}">Bài viết</a></li>
                            <li class="expand"><a href="{{route('get.contact')}}">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
{{--                <!-- mobile menu start -->--}}
{{--                <div class="row">--}}
{{--                    <div class="col-sm-12 mobile-menu-area">--}}
{{--                        <div class="mobile-menu hidden-md hidden-lg" id="mob-menu">--}}
{{--                            <span class="mobile-menu-title">Menu</span>--}}
{{--                            <nav>--}}
{{--                                <ul>--}}
{{--                                    <li><a href="{{route('home')}}">Home</a></li>--}}
{{--                                    <li><a href="shop-grid.html">Man</a>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="shop-grid.html">Dresses</a>--}}
{{--                                                <ul>--}}
{{--                                                    <li><a href="shop-grid.html">Coctail</a></li>--}}
{{--                                                    <li><a href="shop-grid.html">Day</a></li>--}}
{{--                                                    <li><a href="shop-grid.html">Evening </a></li>--}}
{{--                                                    <li><a href="shop-grid.html">Sports</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </li>--}}
{{--                                            <li><a class="mega-menu-title" href="shop-grid.html"> Handbags </a>--}}
{{--                                                <ul>--}}
{{--                                                    <li><a href="shop-grid.html">Blazers</a></li>--}}
{{--                                                    <li><a href="shop-grid.html">Table</a></li>--}}
{{--                                                    <li><a href="shop-grid.html">Coats</a></li>--}}
{{--                                                    <li><a href="shop-grid.html">Kids</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </li>--}}
{{--                                            <li><a class="mega-menu-title" href="shop-grid.html"> Clothing </a>--}}
{{--                                                <ul>--}}
{{--                                                    <li><a href="shop-grid.html">T-Shirt</a></li>--}}
{{--                                                    <li><a href="shop-grid.html">Coats</a></li>--}}
{{--                                                    <li><a href="shop-grid.html">Jackets</a></li>--}}
{{--                                                    <li><a href="shop-grid.html">Jeans</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li><a href="shop-list.html">Women</a>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="shop-grid.html">Rings</a>--}}
{{--                                                <ul>--}}
{{--                                                    <li><a href="shop-grid.html">Coats & Jackets</a></li>--}}
{{--                                                    <li><a href="shop-grid.html">Blazers</a></li>--}}
{{--                                                    <li><a href="shop-grid.html">Jackets</a></li>--}}
{{--                                                    <li><a href="shop-grid.html">Rincoats</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </li>--}}
{{--                                            <li><a href="shop-grid.html">Dresses</a>--}}
{{--                                                <ul>--}}
{{--                                                    <li><a href="shop-grid.html">Ankle Boots</a></li>--}}
{{--                                                    <li><a href="shop-grid.html">Footwear</a></li>--}}
{{--                                                    <li><a href="shop-grid.html">Clog Sandals</a></li>--}}
{{--                                                    <li><a href="shop-grid.html">Combat Boots</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </li>--}}
{{--                                            <li><a href="shop-grid.html">Accessories</a>--}}
{{--                                                <ul>--}}
{{--                                                    <li><a href="shop-grid.html">Bootees bags</a></li>--}}
{{--                                                    <li><a href="shop-grid.html">Blazers</a></li>--}}
{{--                                                    <li><a href="shop-grid.html">Jackets</a></li>--}}
{{--                                                    <li><a href="shop-grid.html">Jackets</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </li>--}}
{{--                                            <li><a href="shop-grid.html">Top</a>--}}
{{--                                                <ul>--}}
{{--                                                    <li><a href="shop-grid.html">Briefs</a></li>--}}
{{--                                                    <li><a href="shop-grid.html">Camis</a></li>--}}
{{--                                                    <li><a href="shop-grid.html">Nigntwears</a></li>--}}
{{--                                                    <li><a href="shop-grid.html">Shapewears</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li><a href="shop-grid.html">Shop</a>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="shop-list.html">Shop Pages</a>--}}
{{--                                                <ul>--}}
{{--                                                    <li><a href="shop-list.html">List View </a></li>--}}
{{--                                                    <li><a href="shop-grid.html">Grid View</a></li>--}}
{{--                                                    <li><a href="login.html">My Account</a></li>--}}
{{--                                                    <li><a href="wishlist.html">Wishlist</a></li>--}}
{{--                                                    <li><a href="cart.html">Cart </a></li>--}}
{{--                                                    <li><a href="checkout.html">Checkout </a></li>--}}
{{--                                                </ul>--}}
{{--                                            </li>--}}
{{--                                            <li><a href="product-details.html">Product Types</a>--}}
{{--                                                <ul>--}}
{{--                                                    <li><a href="product-details.html">Simple Product</a></li>--}}
{{--                                                    <li><a href="product-details.html">Variables Product</a></li>--}}
{{--                                                    <li><a href="product-details.html">Grouped Product</a></li>--}}
{{--                                                    <li><a href="product-details.html">Downloadable</a></li>--}}
{{--                                                    <li><a href="product-details.html">Virtual Product</a></li>--}}
{{--                                                    <li><a href="product-details.html">External Product</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li><a href="#">Pages</a>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="shop-grid.html">Shop Grid</a></li>--}}
{{--                                            <li><a href="shop-list.html">Shop List</a></li>--}}
{{--                                            <li><a href="product-details.html">Product Details</a></li>--}}
{{--                                            <li><a href="contact-us.html">Contact Us</a></li>--}}
{{--                                            <li><a href="about-us.html">About Us</a></li>--}}
{{--                                            <li><a href="cart.html">Shopping cart</a></li>--}}
{{--                                            <li><a href="checkout.html">Checkout</a></li>--}}
{{--                                            <li><a href="wishlist.html">Wishlist</a></li>--}}
{{--                                            <li><a href="login.html">Login</a></li>--}}
{{--                                            <li><a href="404.html">404 Error</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li><a href="about-us.html">About Us</a></li>--}}
{{--                                    <li><a href="contact-us.html">Contact Us</a></li>--}}
{{--                                </ul>--}}
{{--                            </nav>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- mobile menu end -->--}}
            </div>
            <!-- mainmenu area end -->
            <!-- top details area start -->
            <div class="col-md-3 col-sm-12 nopadding-left">
                <div class="top-detail">
                    <!-- language division start -->
                    <div class="disflow">
{{--                        <div class="expand lang-all disflow">--}}
{{--                            <a href="#"><img src="{{asset('themes_template/img/country/en.gif')}}" alt="">English</a>--}}
{{--                            <ul class="restrain language">--}}
{{--                                <li><a href="#"><img src="{{asset('themes_template/img/country/it.gif')}}" alt="">italiano</a></li>--}}
{{--                                <li><a href="#"><img src="{{asset('themes_template/img/country/nl_nl.gif')}}" alt="">Nederlands</a></li>--}}
{{--                                <li><a href="#"><img src="{{asset('themes_template/img/country/de_de.gif')}}" alt="">Deutsch</a></li>--}}
{{--                                <li><a href="#"><img src="{{asset('themes_template/img/country/en.gif')}}" alt="">English</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                        @if(Auth::check())
                            <div class="expand lang-all disflow">
                                <a href="{{route('user.dashboard')}}">Hi {{ Auth::user()->name}} !</a>
                            </div>
                        @endif
                    </div>
                    <!-- language division end -->
                    <!-- addcart top start -->
                    <div class="disflow">
                        <div class="circle-shopping expand">
                            <div class="shopping-carts text-right">
                                <div class="cart-toggler">
                                    <a href="{{route('get.list.shopping.cart')}}"><i class="icon-bag"></i></a>
                                    <a href="{{route('get.list.shopping.cart')}}"><span class="cart-quantity">{{\Cart::count()}}</span></a>
                                </div>
{{--                                <div class="restrain small-cart-content">--}}
{{--                                    <ul class="cart-list">--}}
{{--                                        <li>--}}
{{--                                            <a class="sm-cart-product" href="product-details.html">--}}
{{--                                                <img src="{{asset('themes_template/img/products/sm-products/cart1.jpg')}}" alt="">--}}
{{--                                            </a>--}}
{{--                                            <div class="small-cart-detail">--}}
{{--                                                <a class="remove" href="#"><i class="fa fa-times-circle"></i></a>--}}
{{--                                                <a href="#" class="edit-btn"><img src="{{asset('themes_template/img/btn_edit.gif')}}" alt="Edit Button" /></a>--}}
{{--                                                <a class="small-cart-name" href="product-details.html">Voluptas nulla</a>--}}
{{--                                                <span class="quantitys"><strong>1</strong>x<span>$75.00</span></span>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a class="sm-cart-product" href="product-details.html">--}}
{{--                                                <img src="{{asset('themes_template/img/products/sm-products/cart2.jpg')}}" alt="">--}}
{{--                                            </a>--}}
{{--                                            <div class="small-cart-detail">--}}
{{--                                                <a class="remove" href="#"><i class="fa fa-times-circle"></i></a>--}}
{{--                                                <a href="#" class="edit-btn"><img src="{{asset('themes_template/img/btn_edit.gif')}}" alt="Edit Button" /></a>--}}
{{--                                                <a class="small-cart-name" href="product-details.html">Donec ac tempus</a>--}}
{{--                                                <span class="quantitys"><strong>1</strong>x<span>$75.00</span></span>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                    <p class="total">Subtotal: <span class="amount">$155.00</span></p>--}}
{{--                                    <p class="buttons">--}}
{{--                                        <a href="checkout.html" class="button">Checkout</a>--}}
{{--                                    </p>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <!-- addcart top start -->
                    <!-- search divition start -->
                    <div class="disflow">
                        <div class="header-search expand">
                            <div class="search-icon fa fa-search"></div>
                            <div class="product-search restrain">
                                <div class="container nopadding-right">
                                    <form action="{{route('get.search.product')}}"  method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="search_product" maxlength="128" placeholder="Search product...">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- search divition end -->
                    <div class="disflow">
                        <div class="expand dropps-menu">
                            <a href="#"><i class="fa fa-align-center"></i></a>
                            @if(Auth::check())
                                <ul class="restrain language" style="text-align: center">
                                    <li><a href="{{route('user.dashboard')}}">Tài khoản</a></li>
                                    <li><a href="{{route('user.update.password')}}">Đổi mật khẩu</a></li>
                                    <li><a href="{{route('user.transaction.dashboard')}}">Đơn hàng của bạn</a></li>
                                    <li><a href="wishlist.html">Danh sách yêu thích</a></li>
                                    <li><a href="cart.html">Giỏ hàng</a></li>
                                    <li><a href="checkout.html">Thanh toán</a></li>
                                    <li><a href="{{route('get.logout.user')}}">Đăng xuất</a></li>
                                </ul>
                            @else
                                <ul class="restrain language " style="text-align: center">
                                    <li><a href="{{route('get.register')}}">Đăng kí</a></li>
                                    <li><a href="{{route('get.login')}}">Đăng nhập</a></li>
                                </ul>
                            @endif
                        </div>

                    </div>
                    <div class="disflow">

{{--                        @if(\Session::has('success'))--}}
{{--                            <div class="alert alert-success" style="position: fixed; right: 20px">--}}
{{--                                <strong>Thành công! </strong> {{\Session::get('success')}}--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        @if(\Session::has('danger'))--}}
{{--                            <div class="alert alert-danger" style="position: fixed; right: 20px">--}}
{{--                                <strong>Thất bại! </strong> {{\Session::get('danger')}}--}}
{{--                            </div>--}}
{{--                        @endif--}}
                        @if(Session::has('success'))
                            <div class="alert alert-success" id="success-alert">
                                <strong>Thành công! </strong>{{\Session::get('success')}}
                            </div>
                        @endif
                        @if(\Session::has('danger'))
                            <div class="alert alert-danger" id="success-alert">
                                <strong>Thất bại! </strong> {{\Session::get('danger')}}
                            </div>
                        @endif
                        @if(\Session::has('warning'))
                            <div class="alert alert-warning" id="success-alert">
                                <strong>Cảnh báo! </strong> {{\Session::get('warning')}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- top details area end -->
        </div>
    </div>
</header>

