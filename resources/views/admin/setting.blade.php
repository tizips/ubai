@extends('layouts.admin')
@section('Style')
    <link href="https://cdn.bootcss.com/bootstrap-fileinput/4.3.5/css/fileinput.min.css" rel="stylesheet">
@endsection
@section('content')
            <div class="container-fluid">
                <div class="row">
                    <form action="{{ url('toUpdateSetting') }}" class="form-horizontal" id="firendLinkValidatioin" method="post">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header"></div>
                                <div class="content">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">网站名称</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" placeholder="网站名称" name="web_name" value="{{ config('site.web_name') }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">网站网址</label>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="网站网址" value="{{ config('site.web_url') }}" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">网站 Logo</label>
                                        <div class="col-md-9">
                                            <input type="file" name="thumb" class="file" id="uploadLogo" multiple>
                                            <div id="ErrorBlock" class="help-block"></div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="web_logo" value="{{ config('site.web_logo') }}">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">联系邮箱</label>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="站长联系邮箱" name="admin_email" class="form-control" value="{{ config('site.admin_email') }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">上传限制</label>
                                        <div class="col-md-9">
                                            <input type="number" name="upload_limit" value="{{ config('site.upload_limit') }}" class="form-control" placeholder="文件上传最大限制">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">备案号</label>
                                        <div class="col-md-9">
                                            <input type="text" name="web_tcp" value="{{ config('site.web_tcp') }}" placeholder="网站备案号" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">网站简述</label>
                                        <div class="col-md-9">
                                            <textarea name="web_description" class="form-control" placeholder="网站简述 ...">{{ config('site.web_description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label"></label>
                                        <div class="col-md-9">
                                            <button type="submit" class="btn btn-info btn-fill btn-wd">提交</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
@endsection
@section('JavaScript')
    <script src="https://cdn.bootcss.com/bootstrap-fileinput/4.3.5/js/fileinput.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap-fileinput/4.3.5/js/locales/zh.min.js"></script>
            {{--<script type="text/javascript">--}}

                {{--$('#firendLinkValidatioin').validate();--}}

            {{--</script>--}}

            <script>
                $("#uploadLogo").fileinput({
                    language: 'zh',
                    uploadUrl: '#', // you must set a valid URL here else you will get an error
                    allowedFileExtensions : ['jpg', 'png','gif'],
                    elErrorContainer: '#ErrorBlock',
                    overwriteInitial: false,
                    showPreview: false,
//        dropZoneEnabled: false,
                    maxFileSize: 400,
                    maxFilesNum: 10,
                    slugCallback: function(filename) {
                        return filename.replace('(', '_').replace(']', '_');
                    }
                });
                /*
                 $("#test-upload").on('fileloaded', function(event, file, previewId, index) {
                 alert('i = ' + index + ', id = ' + previewId + ', file = ' + file.name);
                 });
                 图片上传完成之后的回调函数
                 */

            </script>
@endsection