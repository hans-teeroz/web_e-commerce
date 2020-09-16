@if(isset($orders))
    <table class="table table-hover shopping-cart-wrap">
        <thead class="text-muted">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Sản phẩm</th>
            <th scope="col" >Số lượng</th>
            <th scope="col" >Avatar</th>
            <th scope="col" >Thành tiền</th>
        </tr>
        </thead>
        <tbody>

            <?php $i =1?>
            @foreach($orders as $key => $order)
                <tr>
                    <td>{{$i}}</td>
                    <td>
                        <dt class="title text-truncate"><a href="{{route('get.detail.product', [$order->getTran->pro_slug,$order->or_product_id])}}" target="_blank">{{isset($order->getTran->pro_name) ? $order->getTran->pro_name : '[N\A]'}} </a></dt>
                        <dt>Giá sản phẩm: {{number_format(($order->or_price))}} VNĐ</dt>
                        <dt>Sales: {{$order->or_sale}} %</dt>
                        <dt>Số lượng trong kho: {{$order->getTran->pro_number}} - <span class="label {{$order->getTran->pro_number < 1 ? 'label-danger' : 'label-success'}}">{{$order->getTran->pro_number < 1 ? 'Tạm hết hàng' : 'Còn hàng'}}</span></dt>
                    <td>
                        <div>{{$order->or_qty}}</div>
                    </td>
                    <td>
                        <img src="{{isset($order->getTran->pro_avatar) ? pare_url_file($order->getTran->pro_avatar) : '[N\A]'}}" width="100px" height="100px" alt="">
                    </td>
                    <td>
                        <div class="price-wrap">
                            {{--                                        <var class="price">{{number_format(($product->price-($product->price*$product->options->price_sale)/100)*$product->qty)}} VNĐ</var>--}}
                            <var class="price">{{number_format( (($order->or_price*(100 - $order->or_sale)) / 100) *$order->or_qty)}} VNĐ</var>
                        </div> <!-- price-wrap .// -->
                    </td>
                </tr>
                <?php $i++?>
            @endforeach

        </tbody>
    </table>
@endif
