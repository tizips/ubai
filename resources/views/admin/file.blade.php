@extends('layouts.admin')
@section('Style')
    <link href="https://cdn.bootcss.com/bootstrap-fileinput/4.3.5/css/fileinput.min.css" rel="stylesheet">
@endsection
@section('content')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <img src="http://ubai.com/upload/article/41220161220231830.jpg" alt="">
                        <h3 class="left">title</h3>
                    </div>
                </div>
            </div>
@endsection
@section('JavaScript')
    <script src="https://cdn.bootcss.com/bootstrap-fileinput/4.3.5/js/fileinput.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap-fileinput/4.3.5/js/locales/zh.min.js"></script>

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