@extends('admin::layouts.master')
@section('content')
    <style>
        .main-section {
            margin: 0 auto;
            padding: 20px;
            margin-top: 100px;
            background-color: #0b3e6f;
            box-shadow: 0px 0px 20px #0b3e6f;
        }
    </style>
    <section class="content-header">
        <h1>Slide Image</h1>
    </section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Cập nhật Slide:</h3>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-11">
                        <h1>Upload ảnh</h1>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <input type="file" name="images" id="file-1" multiple class="filename"
                                   data-overwrite-initial="fasle" data-min-file-count="2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
@section('script')
    <script type="text/javascript">
        $("#file-1").fileinput({
            theme: 'fa',
            uploadUrl: '{{route('admin.post.list.slide')}}',

            uploadExtraData:function () {
                return{
                    _token: $("input[name='_token']").val()
                };
            },
            allowedFileExtensions: ['jpg','png','gif'],
            overwriteInitial: false,
            maxFileSize: 2000,
            maxFileNum: 8,
            slugCallback:function (filename) {
                return filename.replace('(','_').replace(']','_');
            }

        });
    </script>
@stop
