@extends('layouts.admin')
@section('Style')

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <form action="{{ url('admin/toEditLink') }}" id="linkForm" class="form-horizontal" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $link->id }}" />
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">{{ $title }}</div>
                        <div class="content">
                            <div class="form-group">
                                <label class="col-md-2 control-label">名称</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" placeholder="网站名称" name="web_name" value="{{ old('web_name') ? old('web_name') : $link->web_name }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">网址</label>
                                <div class="col-md-9">
                                    <input type="text" placeholder="网站网址" name="web_url" value="{{ old('web_url') ? old('web_url') : $link -> web_url }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">站长</label>
                                <div class="col-md-9">
                                    <input class="form-control" value="{{ old('web_admin') ? old('web_admin') : $link -> web_admin }}" type="text" placeholder="站长名称" name="web_admin" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">联系邮箱</label>
                                <div class="col-md-9">
                                    <input type="text" placeholder="站长联系邮箱" value="{{ old('web_email') ? old('web_email') : $link -> web_email }}" name="web_email" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">logo</label>
                                <div class="col-md-9">
                                    <input type="text" placeholder="站点 LOGO" value="{{ old('web_logo') ? old('web_logo') : $link -> web_logo }}" name="web_logo" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">排列位置</label>
                                <div class="col-md-9">
                                    <input type="text" name="web_order" value="{{ old('web_order') ? old('web_order') : $link -> web_order }}" placeholder="友链排列位置" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">网站简述</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="web_description" placeholder="网站简述 ...">{{ old('web_description') ? old('web_description') : $link->web_description }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">隐藏</label>
                                <div class="col-md-9">
                                    <label class="checkbox">
                                        <input type="checkbox" name="web_status" @if(empty(old('web_status'))) {{ $link->web_status ? 'checked' : '' }} @else {{ old('web_status') ? 'checked' : '' }}  @endif data-toggle="checkbox" value="1" >
                                    </label>
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

    <script type="text/javascript">

//            $('#linkForm').bootstrapValidator({
//                fields: {
//                    name: {
//                        validators: {
//                            notEmpty: {
//                                message: '站点名称不能为空'
//                            }
//                        }
//                    },
//                    url: {
//                        validators: {
//                            notEmpty: {
//                                message: '网址不能为空'
//                            },
//                            regexp: {
//                                regexp: /^http(s)?:\/\/([a-zA-Z]{1,8}\.){1,3}[a-zA-Z]{2,6}$/,
//                                message: '网址格式有误'
//                            }
//                        }
//                    },
//                    admin: {
//                        validators: {
//                            notEmpty: {
//                                message: '管理员不能为空'
//                            }
//                        }
//                    },
//                    email: {
//                        validators: {
//                            notEmpty: {
//                                message: '管理员邮箱不能为空'
//                            },
//                            emailAddress: {
//                                message: '邮箱地址格式有误'
//                            }
//                        }
//                    },
//                    order: {
//                        validators: {
//                            regexp: {
//                                regexp: /^[0-9]{0,3}$/,
//                                message: '请输入数值'
//                            }
//                        }
//                    }
//                }
//
//            });
//            $("#linkForm").submit(function(ev){ev.preventDefault();});
            {{--$("button[type=button]").click(function () {--}}
                {{--var bootstrapValidator = $("#linkForm").data('bootstrapValidator');--}}
                {{--bootstrapValidator.validate();--}}
                {{--if(!bootstrapValidator.isValid()){--}}
                    {{--return;--}}
                {{--}--}}

                {{--$.ajax({--}}
                    {{--url: '/admin/toEditLink',--}}
                    {{--type: 'POST',--}}
                    {{--data: {--}}
                        {{--_token: '{{ csrf_token() }}',--}}
                        {{--id: {{ $link->id }},--}}
                        {{--web_name: $('input[name=name]').val(),--}}
                        {{--web_url: $('input[name=url]').val(),--}}
                        {{--web_admin: $('input[name=admin]').val(),--}}
                        {{--web_email: $('input[name=email]').val(),--}}
                        {{--web_logo: '',--}}
                        {{--web_order: $('input[name=order]').val(),--}}
                        {{--web_status: $("input[name=status]:checked").val() ? 1 : 0,--}}
                        {{--web_description: $('textarea[name=description]').val()--}}
                    {{--},--}}
                    {{--success: function (data) {--}}
                        {{--if (data['status'] ==1) {--}}
                            {{--notify('success' , data['msg']);--}}
                        {{--}else if (data['status'] == 0) {--}}
                            {{--notify('error' , data['msg']);--}}
                        {{--}else {--}}
                            {{--notify('error' , '服务器错误，请稍后重试');--}}
                        {{--}--}}
                    {{--},--}}
                    {{--error: function () {--}}
                        {{--notify('error' , '服务器错误，请稍后重试');--}}
                    {{--}--}}
                {{--});--}}
            {{--});--}}

    </script>
@endsection