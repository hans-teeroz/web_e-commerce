@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="alert-info" style="font-size: medium;-moz-border-radius: 10px;-webkit-border-radius: 10px;-ms-border-radius: 10px;-o-border-radius: 10px;border-radius: 10px;" id="CartMsg"></div>
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
                                    <input type="number" class="form-control" name="pro_sale" value="{{$product->qty}}" onchange="updateCart(this.value,'{{$key}}','{{$product->id}}','{{$product->price}}','{{$i}}');" placeholder="10">
{{--                                    <input type="text" maxlength="12" min="1" class="input-text number-sidebar input_pop input_pop {{$product->id}}" id="{{$product->id}}" name="Lines" size="4" value="{{$product->qty}}">--}}
                                </td>
                                <td>

{{--                                        <var class="price">{{number_format(($product->price-($product->price*$product->options->price_sale)/100)*$product->qty)}} VNĐ</var>--}}
                                        <span class="price-product">{{number_format(($product->price*$product->qty))}}</span> VNĐ
{{--                                        <small class="text-muted">(USD5 each)</small>--}}
                                </td>
                                <td class="text-right">
{{--                                    <a title="" href="" class="btn btn-outline-success" data-toggle="tooltip" data-original-title="Save to Wishlist"> <i class="fa fa-heart"></i></a>--}}
                                    <a href="{{route('delete.shopping.cart',$key)}}" class="btn btn-outline-danger"> × Remove</a>
                                </td>
                            </tr>
                            <?php $i++?>
                        @endforeach
                    @endif

                </tbody>
            </table>
            @if(\Cart::subtotal(0,0) == 0)
                <h1>Giỏ hàng của bạn đang trống! Xin mời mua hàng</h1>
            @endif
            @if(\Cart::subtotal(0,0) > 0)
                <h5  class="pull-right">Tổng tiền cần thanh toán: <span id="price-total">{{ \Cart::subtotal(0,0) }}</span>  VNĐ <a href="{{route('get.form.pay')}}" class="btn btn-success">Thanh toán</a></h5>
{{--                <h5 class="pull-right"><a href="{{route('get.paypal')}}" target="_blank" class="btn btn-danger">Thanh toán PayPal</a></h5>--}}
            @endif
        </div> <!-- card.// -->

    </div>
    <!--container end.//-->



@stop
@section('script')
    <script>
        {{--function updateCart(qty,key) {--}}
        {{--    $.get(--}}
        {{--        '{{route('update.shopping.cart')}}',--}}
        {{--        {qty:qty,key:key},--}}
        {{--        function () {--}}
        {{--            location.reload();--}}
        {{--        }--}}
        {{--    );--}}
        {{--}--}}

             function updateCart(qty,key,id,price,i) {
                $("#CartMsg").hide();
                //$proPrice = qty*price;
               // var x = document.getElementsByClassName("price-product");
                //x[i-1].innerHTML = $proPrice;
                $.ajax({
                    url: '{{route('update.shopping.cart')}}',
                    data: {qty:qty,key:key,id:id},
                    type: 'get',
                    success:function (result) {
                        //console.log(result['price'])
                        //console.log(price['price'])
                        $("#price-total").html(result['data']);
                        var x = document.getElementsByClassName("price-product");
                        x[i-1].innerHTML = result['price'];
                        //console.log(x[i-1].innerHTML);
                        //$("tbody").find('tr .price-product').html(result['price']);
                       // $("tr").children('td').children('#price-product').html(result['price']);
                        $("#CartMsg").show();
                        $("#CartMsg").html(result['msg']);
                        if (result['price'] == 0){
                            window.location.reload();
                        }
                    }
            })
            }
    </script>
@stop
