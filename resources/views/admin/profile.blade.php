@extends('layouts.admin')

@section('Style')
    <link rel="stylesheet" href="/Static/Fileinput/css/fileinput.min.css">
@endsection

@section('content')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">{{ $title }}</h4>
                            </div>
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>用户名</label>
                                                <input type="text" class="form-control" disabled value="{{ $user -> name }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>笔名</label>
                                                <input type="text" name="name" class="form-control" value="{{ $user -> pen_name or '' }}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>头像</label>
                                                <input type="file" class="file" id="uploadThumb" name="uploadThumb" multiple>
                                                <div id="ErrorBlock" class="help-block"></div>
                                            </div>
                                            <input type="hidden" name="thumb" value="{{ $user -> thumb }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>邮箱</label>
                                                <input type="text" name="email" class="form-control" value="{{ $user -> email or '' }}" placeholder="***@example.com" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Github</label>
                                                <input type="text" name="github" class="form-control" value="{{ $user -> github or '' }}" placeholder="https://github.com/tizips/" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>个人简介</label>
                                                <textarea rows="5" name="content" class="form-control" placeholder="请一句话介绍你自己，大部分情况下会在你的头像和名字旁边显示">{{ $user -> content or '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button name="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="/Static/admin/images/full-screen-image-3.jpg" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                    <a href="#">
                                        <img class="avatar border-gray" src="{{ $user -> thumb }}" alt="{{ $user -> name }}"/>

                                        <h4 class="title">{{ $user -> name }}<br />
                                            <small>michael24</small>
                                        </h4>
                                    </a>
                                </div>
                                <p class="description text-center"> "Lamborghini Mercy <br>
                                    Your chick she so thirsty <br>
                                    I'm in that two seat Lambo"
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <a href="{{ $user -> github }}" target="_blank" class="btn btn-simple"><i class="fa fa-github"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
@endsection

@section('JavaScript')

    <script src="/Static/Fileinput/js/fileinput.min.js"></script>
    <script src="/Static/Fileinput/js/locales/zh.js"></script>
    <script>

        $("#uploadThumb").fileinput({
            language: 'zh',
            uploadUrl: '/admin/profile/uploadThumb', // you must set a valid URL here else you will get an error
            allowedFileExtensions : ['jpg', 'png','gif'],
            elErrorContainer: '#ErrorBlock',
            overwriteInitial: false,
            showPreview: false,
            maxFileSize: 400,
            maxFilesNum: 1,
            uploadExtraData: {
                _token: '{{ csrf_token() }}'
            },
            slugCallback: function(filename) {
                return filename.replace('(', '_').replace(']', '_');
            }
        }).on('fileuploaded' , function (e, data) {
            if (data.response['status'] ==0) {
                $("input[name=thumb]").val(data.response['url']);
            }
        });
        /*
         图片上传完成之后的回调函数
         */
    </script>
    <script type="text/javascript">
        $().ready(function () {

            $("button[name=submit]").click(function () {

                $.ajax({
                    url: '/admin/toUpdateProfile',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: {{ $user -> id }},
                        pen_name: $('input[name=name]').val(),
                        thumb: $('input[name=thumb]').val(),
                        email: $("input[name=email]").val(),
                        github: $('input[name=github]').val(),
                        content: $('textarea[name=content]').val()
                    },
                    success: function (data) {
                        if (data['status'] == 1) {
                            notify('success', data['msg']);
                        } else if (data['status'] == 0) {
                            notify('error', data['msg']);
                        } else {
                            notify('error', '服务器错误，请稍后重试');
                        }
                    },
                    error: function () {
                        notify('error', '服务器错误，请稍后重试');
                    }
                });
            });
        });
    </script>
@endsection