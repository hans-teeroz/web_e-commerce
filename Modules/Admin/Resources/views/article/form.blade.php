<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"> {{ isset($article->id) ? "Cập nhật bài viết" : "Thêm mới bài viết" }} </h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form  action="" method="POST" enctype="multipart/form-data">
        @csrf
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="a_name" >Tên bài viết</label>
                            <input type="text" class="form-control" name="a_name" value="{{old('a_name',isset($article->a_name) ? $article->a_name : '')}}"  placeholder="Nhập tên bài viết">
                            @if($errors->has('a_name'))
                                <div class="error-text">
                                    {{$errors->first('a_name')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="a_description" >Mô tả</label>
                            <textarea name="a_description" value="{{old('a_description')}}" class="form-control" rows="3" placeholder="Mô tả bài viết ..." style="margin: 0px 4.5px 0px 0px; width: 775px; height: 98px;">{{isset($article->a_description) ? old('a_description',$article->a_description): old('a_description')}}</textarea>
                            @if($errors->has('a_description'))
                                <div class="error-text">
                                    {{$errors->first('a_description')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="a_content" >Nội dung</label>
                            <textarea name="a_content" id="a_content" value="{{old('a_content')}}"  class="form-control" rows="3" placeholder="Nội dung bài viết ..." style="margin: 0px 4.5px 0px 0px; width: 775px; height: 78px;">{{isset($article->a_content)? old('a_content',$article->a_content) : old('a_description')}}</textarea>
                            @if($errors->has('a_content'))
                                <div class="error-text">
                                    {{$errors->first('a_content')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="a_title_seo" >Meta Title</label>
                            <input type="text" value="{{old('a_title_seo',isset($article->a_title_seo) ? $article->a_title_seo : '')}}" class="form-control" name="a_title_seo"  placeholder="Meta Title">
                        </div>

                        <div class="form-group">
                            <label for="a_description_seo" >Meta Description</label>
                            <input type="text" class="form-control" name="a_description_seo" value="{{old('a_description_seo',isset($article->a_description_seo) ? $article->a_description_seo : '')}}" placeholder="Meta Description">
                        </div>
                        <div class="form-group">
                            <img id="output_image" src="{{isset($article->a_avatar) ? pare_url_file($article->a_avatar) : asset('image/no_image.png')}}" alt="" width="200px" height="160px">
                        </div>
                        <div class="form-group">
                            <label for="a_avatar">Avatar</label>
                            <input type="file" id="input_image" name="a_avatar">
                            @if($errors->has('a_avatar'))
                                <div class="error-text">
                                    {{$errors->first('a_avatar')}}
                                </div>
                            @endif
                        </div>


                            <button type="submit" class="btn btn-success">Submit</button>

                    </div>
                    <!-- /.box-body -->

                </div>
                <!-- /.box -->

                <!--/.col (left) -->
                <!-- right column -->

            <!-- /.row -->

            </div>

        </section>


    </form>
</div>
@section('script')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('a_content');
    </script>
@stop
