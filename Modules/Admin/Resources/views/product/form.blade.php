<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"> {{ isset($product->id) ? "Cập nhật sản phẩm" : "Thêm mới sản phẩm" }} </h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form  action="" method="POST" enctype="multipart/form-data">
        @csrf
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="pro_name" >Tên sản phẩm</label>
                            <input type="text" class="form-control" name="pro_name" value="{{old('pro_name',isset($product->pro_name) ? $product->pro_name : '')}}"  placeholder="Nhập tên sản phẩm">
                            @if($errors->has('pro_name'))
                                <div class="error-text">
                                    {{$errors->first('pro_name')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="pro_description" >Mô tả</label>
                            <textarea name="pro_description" value="{{old('pro_description')}}" class="form-control" rows="3" placeholder="Mô tả sản phẩm ..." style="margin: 0px 4.5px 0px 0px; width: 495px; height: 78px;">{{isset($product->id)? old('pro_description',$product->pro_description) : old('pro_description')}}</textarea>
                            @if($errors->has('pro_description'))
                                <div class="error-text">
                                    {{$errors->first('pro_description')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="pro_content" >Nội dung</label>
                            <textarea name="pro_content" value="{{old('pro_content')}}" id="pro_content" class="form-control" rows="3" placeholder="Nội dung sản phẩm ..." style="margin: 0px 4.5px 0px 0px; width: 495px; height: 78px;">{{isset($product->id)? old('pro_content',$product->pro_content) : old('pro_content')}}</textarea>
                            @if($errors->has('pro_content'))
                                <div class="error-text">
                                    {{$errors->first('pro_content')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="pro_title_seo" >Meta Title</label>
                            <input type="text" value="{{old('pro_title_seo',isset($product->pro_title_seo) ? $product->pro_title_seo : '')}}" class="form-control" name="pro_title_seo"  placeholder="Meta Title">
                        </div>

                        <div class="form-group">
                            <label for="pro_description_seo" >Meta Description</label>
                            <input type="text" class="form-control" name="pro_description_seo" value="{{old('pro_description_seo',isset($product->pro_description_seo) ? $product->pro_description_seo : '')}}" placeholder="Meta Description">
                        </div>

                    </div>
                    <!-- /.box-body -->

                </div>
                <!-- /.box -->

                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group">
                                <label for="pro_category_id">Loại sản phẩm</label>
                                <select name="pro_category_id" id="" class="form-control">
                                    <option value="">--Chọn loại sản phẩm--</option>
                                    @if(isset($categories))
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{ old('pro_category_id',isset($product->pro_category_id) ? $product->pro_category_id : '') == $category->id ? "selected='selected'" : "" }} >{{$category->c_name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @if($errors->has('pro_category_id'))
                                    <div class="error-text">
                                        {{$errors->first('pro_category_id')}}
                                    </div>
                                @endif
                            </div>


                            <div class="form-group">
                                <img id="output_image" src="{{isset($product->pro_avatar) ? pare_url_file($product->pro_avatar) : asset('image/no_image.png')}}" alt="" width="200px" height="160px">
                            </div>

                            <div class="form-group">
                                <label for="pro_avatar">Avatar</label>
                                <input type="file" id="input_image" value="{{old('pro_avatar',isset($product->pro_avatar) ? pare_url_file($product->pro_avatar) : asset('image/no_image.png'))}}" name="pro_avatar">
                                @if($errors->has('pro_avatar'))
                                    <div class="error-text">
                                        {{$errors->first('pro_avatar')}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="pro_price" >Giá sản phẩm</label>
                                <input name="pro_price" type="number" class="form-control"  value="{{old('pro_price',isset($product->pro_price) ? $product->pro_price : '')}}" placeholder="Giá sản phẩm">
                                @if($errors->has('pro_price'))
                                    <div class="error-text">
                                        {{$errors->first('pro_price')}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="pro_sale" >Khuyến mãi sản phẩm (%)</label>
                                <input type="number" class="form-control" name="pro_sale" value="{{old('pro_sale',isset($product->pro_sale) ? $product->pro_sale : '0')}}" placeholder="10">
                                @if($errors->has('pro_sale'))
                                    <div class="error-text">
                                        {{$errors->first('pro_sale')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="pro_number" >Số lượng </label>
                                <input type="number" class="form-control" name="pro_number" value="{{old('pro_number',isset($product->pro_number) ? $product->pro_number : '0')}}" placeholder="10">
                                @if($errors->has('pro_number'))
                                    <div class="error-text">
                                        {{$errors->first('pro_number')}}
                                    </div>
                                @endif
                            </div>

{{--                            <div class="checkbox">--}}
{{--                                <label for="pro_active">--}}
{{--                                    <input type="checkbox" name="pro_hot" value="{{old('pro_hot',isset($product->pro_hot) ? $product->pro_hot : '')}}"> Nổi bật--}}
{{--                                </label>--}}
{{--                            </div>--}}
                    </div>
                    <!-- /.box-body -->

                    <!-- /.box -->

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
            </div>
        </section>

        <div class="box-footer">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
</div>
@section('script')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('pro_content');
    </script>
@stop
