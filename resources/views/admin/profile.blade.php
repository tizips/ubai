@extends('layouts.admin')

@section('Style')
    <link href="https://cdn.bootcss.com/bootstrap-fileinput/4.3.5/css/fileinput.min.css" rel="stylesheet">
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
                                <form action="{{ url('admin/toUpdateProfile') }}" method="post">
                                    <input type="hidden" name="id" value="{{ Auth::id() }}">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>用户名</label>
                                                <input type="text" name="name" class="form-control" disabled value="{{ Auth::user() ->name }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>笔名</label>
                                                <input type="text" name="pen_name" class="form-control {{ $errors->has('pen_name') ? 'error' : '' }}" value="{{ old('pen_name') ? old('pen_name') : Auth::user() -> pen_name }}" />
                                                @if($errors->has('pen_name')) <strong class="text-danger">{{ $errors->first('pen_name') }}</strong> @endif
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
                                            <input type="hidden" name="thumb" value="{{ old('thumb') ? old('thumb') : Auth::user() -> thumb }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>邮箱</label>
                                                <input type="text" name="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" value="{{ old('email') ? old('email') : Auth::user() -> email }}" placeholder="***@example.com" />
                                                @if($errors->has('email')) <strong class="text-danger">{{ $errors->first('email') }}</strong> @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Github</label>
                                                <input type="text" name="github" class="form-control {{ $errors->has('github') ? 'error' : '' }}" value="{{ old('github') ? old('github') : Auth::user() -> github }}" placeholder="https://github.com/tizips/" />
                                                @if($errors->has('github')) <strong class="text-danger">{{ $errors->first('github') }}</strong> @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>个人简介</label>
                                                <textarea rows="5" name="content" class="form-control" placeholder="请一句话介绍你自己，大部分情况下会在你的头像和名字旁边显示">{{ old('content') ? old('content') : Auth::user() -> content }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">更新</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="/images/full-screen-image-3.jpg" alt="{{ Auth::user() -> name }}"/>
                            </div>
                            <div class="content">
                                <div class="author">
                                    <a href="#">
                                        <img class="avatar border-gray" src="{{ Auth::user() -> thumb }}" alt="{{ Auth::user() -> name }}"/>

                                        <h4 class="title">{{ Auth::user() -> name }}<br />
                                            <small>{{ Auth::user() -> created_at -> format('Y年m月d') }}</small>
                                        </h4>
                                    </a>
                                </div>
                                <p class="description text-center">
                                    {{ Auth::user() -> content }}
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <a href="{{ Auth::user() -> github }}" target="_blank" class="btn btn-simple"><i class="fa fa-github"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
@endsection

@section('JavaScript')

    <script src="https://cdn.bootcss.com/bootstrap-fileinput/4.3.5/js/fileinput.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap-fileinput/4.3.5/js/locales/zh.min.js"></script>
    <script src="/js/bootstrap-notify.js"></script>
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
@if(\Illuminate\Support\Facades\Session::has('operateInfo'))
    <script>
        $().ready(function () {
            $.notify({
                icon: 'fa fa-check-circle-o',
                message: "资料修改成功 ！"

            },{
                type: "success",
                placement: {
                    from: "top",
                    align: "right"
                }
            });
        });
    </script>
@endif

@endsection