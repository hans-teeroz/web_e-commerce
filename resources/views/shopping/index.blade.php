@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <table class="table table-hover shopping-cart-wrap">
                <thead class="text-muted">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col" width="120">Số lượng</th>
                    <th scope="col" width="120">Thành tiền</th>
                    <th scope="col" width="200" class="text-right">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                    @if(isset($products))
                        <?php $i =1?>
                        @foreach($products as $key => $product)
                            <tr>
                                <td>{{$i}}</td>
                                <td>
                                    <figure class="media">
                                        <div class="img-wrap"><img src="{{pare_url_file($product->options->pro_avatar)}} " width="100px" height="100px" alt="" class="img-thumbnail img-sm"></div>
                                        <br>
                                        <figcaption class="media-body">
                                            <h6 class="title text-truncate">{{$product->name}} </h6>
                                            <dl class="param param-inline small">
                                                <dt>Giá sản phẩm: {{number_format(($product->price))}} VNĐ</dt>
                                            </dl>
{{--                                            <dl class="param param-inline small">--}}
{{--                                                <dt>Color: </dt>--}}
{{--                                                <dd>Orange color</dd>--}}
{{--                                            </dl>--}}
                                        </figcaption>
                                    </figure>
                                </td>
                                <td>
                                    <a href="{{route('add.shopping.cart',$key)}}"> - </a>
                                    <input type="number" class="form-control" name="pro_sale" value="{{$product->qty}}" placeholder="10">
                                    <a href="{{route('update.shopping.cart',$key)}}"> + </a>
{{--                                    <input type="text" maxlength="12" min="1" class="input-text number-sidebar input_pop input_pop {{$product->id}}" id="{{$product->id}}" name="Lines" size="4" value="{{$product->qty}}">--}}
                                </td>
                                <td>
                                    <div class="price-wrap">
{{--                                        <var class="price">{{number_format(($product->price-($product->price*$product->options->price_sale)/100)*$product->qty)}} VNĐ</var>--}}
                                        <var class="price">{{number_format(($product->price*$product->qty))}} VNĐ</var>
                                        <small class="text-muted">(USD5 each)</small>
                                    </div> <!-- price-wrap .// -->
                                </td>
                                <td class="text-right">
                                    <a title="" href="" class="btn btn-outline-success" data-toggle="tooltip" data-original-title="Save to Wishlist"> <i class="fa fa-heart"></i></a>
                                    <a href="{{route('delete.shopping.cart',$key)}}" class="btn btn-outline-danger"> × Remove</a>
                                </td>
                            </tr>
                            <?php $i++?>
                        @endforeach
                    @endif

                </tbody>
            </table>

            <h5 class="pull-right">Tổng tiền cần thanh toán: {{ \Cart::subtotal(0,0) }} VNĐ <a href="{{route('get.form.pay')}}" class="btn btn-success">Thanh toán</a></h5>

        </div> <!-- card.// -->

    </div>
    <!--container end.//-->



@stop
