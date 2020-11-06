@extends('admin::layouts.master')
@section('content')
    <section class="content-header">
        <h1>Slide Image</h1>
    </section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Slide ảnh:</h3>
            </div>
            @if(isset($slides))
                <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-12">
                        @foreach($slides as $slide)
                                <div class="file-preview-frame krajee-default  kv-preview-thumb">
                                    <div class="kv-zoom-cache">
                                        <div class="file-preview-frame krajee-default  kv-zoom-thumb" id="zoom-thumb-file-1-32173_honda.jpg" data-fileindex="-1" data-fileid="32173_honda.jpg" data-template="image">
                                            <div class="kv-file-content">
                                                <img src="{{pare_url_file($slide->sls_avatar,'slides')}}" class="file-preview-image kv-preview-data" title="honda.jpg" alt="honda.jpg" style="width: auto; height: auto; max-width: 100%; max-height: 100%; image-orientation: from-image;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="file-thumbnail-footer">
                                        <div class="file-footer-caption" title="honda.jpg">
                                            <div class="file-caption-info">{{$slide->sls_avatar}}</div>
                                            <div class="file-size-info"> <samp>{{\Carbon\Carbon::parse($slide->created_at)->diffForHumans()}}</samp></div>
                                        </div>
                                        <div style="margin-bottom: 5px;">
                                            <a  class="label {{ $slide->getStatus($slide->sls_active) ['class'] }}" href="{{ route('admin.get.action.slide',['active',$slide->id])}}">
                                                {{ $slide->getStatus($slide->sls_active) ['name'] }}
                                            </a>
                                            <a style="margin: 9px;" class="label {{ $slide->getbanner_home($slide->sls_banner_home) ['class'] }}" href="{{ route('admin.get.action.slide',['banner_home',$slide->id])}}">
                                                {{ $slide->getbanner_home($slide->sls_banner_home) ['name'] }}
                                            </a>
                                            <a class="label {{ $slide->getbanner_cate($slide->sls_banner_category) ['class'] }}" href="{{ route('admin.get.action.slide',['banner_cate',$slide->id])}}">
                                                {{ $slide->getbanner_cate($slide->sls_banner_category) ['name'] }}
                                            </a>
                                        </div>
                                        <div class="file-actions">
                                            <div class="file-footer-buttons">
{{--                                                <a type="button" class="kv-file-upload btn btn-sm btn-kv btn-default btn-outline-secondary" title="Upload file"><i class="glyphicon glyphicon-upload"></i></a>--}}
                                                <a href="{{route('admin.get.action.slide',['delete',$slide->id])}}"  onclick="return confirm('Are you sure?')" type="button" class="kv-file-remove btn btn-sm btn-kv btn-default btn-outline-secondary" title="Remove file"><i class="glyphicon glyphicon-trash"></i></a>
                                                <a type="button" class="kv-file-zoom btn btn-sm btn-kv btn-default btn-outline-secondary view-image" title="View Details"><i class="glyphicon glyphicon-zoom-in"></i></a href="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        @endforeach
                    </div>
                </div>
            </div>
            @endif
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
