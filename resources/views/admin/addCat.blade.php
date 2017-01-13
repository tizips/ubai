@extends('layouts.admin')
@section('Style')
    <link rel="stylesheet" href="{{ asset('/components/editor/css/wangEditor.min.css') }}">
    <link href="https://cdn.bootcss.com/bootstrap-fileinput/4.3.5/css/fileinput.min.css" rel="stylesheet">
@endsection
@section('content')
            <div class="container-fluid">
                <div class="row">
                    <form action="{{ url('/admin/toAddCat') }}" id="addCat" class="form-horizontal" method="post">
                        {{ csrf_field() }}
                        <div class="col-md-12">
                            <div class="card">
                                <div class="content">
                                    <ul role="tablist" class="nav nav-tabs">
                                        <li role="presentation" class="active">
                                            <a href="#catRoutine" data-toggle="tab"><i class="iconfont">&#xe673;</i> 常规</a>
                                        </li>
                                        <li>
                                            <a href="#catSEO" data-toggle="tab"><i class="iconfont">&#xe650;</i> SEO</a>
                                        </li>
                                        <li>
                                            <a href="#CatCont" data-toggle="tab"><i class="iconfont">&#xe672;</i> 栏目内容</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="catRoutine" class="tab-pane active">
                                            <div class="card">
                                                <div class="header">常规设置</div>
                                                <div class="content">
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">上级栏目</label>
                                                        <div class="col-md-10">
                                                            <select name="cat_pid" class="selectpicker" data-title="栏目" data-style="btn-default btn-block {{ $errors->has('cat_pid') ? 'btn-danger' : 'btn-info' }} btn-fill" data-menu-style="dropdown-blue">
                                                                <option value="0" selected>顶级栏目</option>
                                                                @foreach($catInfo as $val)
                                                                <option value="{{ $val['id'] }}" @if($val['id'] ==$catPid || old('cat_pid') == $val['id']) selected @endif>@if($val['id'] ==0) 顶级栏目 @else {{ $val['cat_title'] }}@endif</option>
                                                                @endforeach
                                                            </select>
                                                            @if($errors -> has('cat_pid'))<strong class="text-danger">{{ $errors->first('cat_pid') }}</strong>@endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">栏目名称</label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="cat_name" placeholder="栏目名称" value="{{ old('cat_name') }}" class="form-control {{ $errors->has('cat_name') ? 'error' : '' }}">
                                                            @if($errors -> has('cat_name'))<strong class="text-danger">{{ $errors->first('cat_name') }}</strong>@endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">栏目图片</label>
                                                        <div class="col-md-10">
                                                            <input type="file" class="file" name="banner" id="uploadBanner" data-min-file-count="1" />
                                                            <div id="ErrorBlock" class="help-block"></div>
                                                        </div>
                                                        <input type="hidden" name="cat_pic" value="{{ old('cat_pic') }}" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">链接地址</label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="cat_url" value="{{ old('cat_url') }}" placeholder="链接地址 ( 为空 Url 为默认链接 )" class="form-control {{ $errors->has('cat_url') ? 'error' : '' }}">
                                                            @if($errors -> has('cat_url'))<strong class="text-danger">{{ $errors->first('cat_url') }}</strong>@endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">排序</label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="cat_order" value="{{ old('cat_order') }}" placeholder="栏目从大到小排序，默认为 0" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">是否隐藏</label>
                                                        <div class="col-md-10">
                                                            <label class="checkbox">
                                                                <input name="cat_status" type="checkbox" {{ old('cat_status') ? 'checked' : '' }} data-toggle="checkbox" value="1">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="catSEO" class="tab-pane">
                                            <div class="card">
                                                <div class="header">SEO 设置</div>
                                                <div class="content">
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">SEO 标题</label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="cat_seo_title" value="{{ old('cat_seo_title') }}" placeholder="SEO 栏目标题" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">SEO 关键词</label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="cat_seo_keyword" value="{{ old('cat_seo_keyword') }}" placeholder="SEO 关键词" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">SEO 描述</label>
                                                        <div class="col-md-10">
                                                            <textarea name="cat_seo_description" class="form-control" placeholder="SEO 描述">{{ old('cat_seo_description') }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="CatCont" class="tab-pane">
                                            <div class="card">
                                                <div class="header">栏目内容</div>
                                                <div class="content">
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">是否生成单页</label>
                                                        <div class="col-md-10">
                                                            <label class="checkbox">
                                                                <input name="cat_page" type="checkbox" {{ old('cat_page') ? 'checked' : '' }} data-toggle="checkbox" value="1">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">是否开启留言</label>
                                                        <div class="col-md-10">
                                                            <label class="checkbox">
                                                                <input name="cat_comment" type="checkbox" {{ old('cat_comment') ? 'checked' : '' }} data-toggle="checkbox" value="1">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">单页内容</label>
                                                        <div class="col-md-10">
                                                            <textarea name="cat_page_content" id="catEditor" style="display:none; height: 400px;">{{ old('cat_page_content') }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button name="submit" class="btn btn-info btn-fill btn-wd">添加</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

@endsection
@section('JavaScript')
    <script src="{{ asset('components/editor/js/wangEditor.min.js') }}"></script>
    <script src="https://cdn.bootcss.com/bootstrap-fileinput/4.3.5/js/fileinput.min.js"></script>
    {{--<script src="/Static/Fileinput/js/locales/zh.js"></script>--}}
    <script src="https://cdn.bootcss.com/bootstrap-fileinput/4.3.5/js/locales/zh.min.js"></script>
    <script>

        $("#uploadBanner").fileinput({
            language: 'zh',
            uploadUrl: '/admin/uploadPic', // you must set a valid URL here else you will get an error
            allowedFileExtensions: ['jpg', 'png','gif'],
            elErrorContainer: '#ErrorBlock',
            showUpload: false,
            showRemove: false,
            showCaption: true,
            dropZoneEnabled: false,
//            overwriteInitial: false,
            maxFileCount: 1,
            uploadExtraData: {
                _token: '{{ csrf_token() }}'
            },
//            initialPreview: [
//                "<img src='/upload/article/1201611160138.jpg' width='100%' class='file-preview-image' alt='Desert' title='Desert'>"
//            ],
            slugCallback: function(filename) {
                return filename.replace('(', '_').replace(']', '_');
            }
        }).on('fileuploaded' , function (e, data) {
            if (data.response['info'] ==1) {
                $("input[name=bannerPic]").val(data.response['cont']);
            }
        });
        /**
         图片上传完成之后的回调函数
         */
    </script>
    <script type="text/javascript">
        // 阻止输出log
        // wangEditor.config.printLog = false;

        var editor = new wangEditor('catEditor');

        // 上传图片
        editor.config.uploadImgUrl = '/upload';
        editor.config.uploadParams = {
            // token1: 'abcde',
            // token2: '12345'
        };
        editor.config.uploadHeaders = {
            // 'Accept' : 'text/x-json'
        }
        // editor.config.uploadImgFileName = 'myFileName';

        // 隐藏网络图片
        // editor.config.hideLinkImg = true;

        // 表情显示项
        editor.config.emotionsShow = 'value';
        editor.config.emotions = {
            'default': {
                title: '默认',
                data: '/components/editor/emotion/emotions.data'
            },
            'weibo': {
                title: '微博表情',
                data: [
                    {
                        icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/7a/shenshou_thumb.gif',
                        value: '[草泥马]'
                    },
                    {
                        icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/60/horse2_thumb.gif',
                        value: '[神马]'
                    },
                    {
                        icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/bc/fuyun_thumb.gif',
                        value: '[浮云]'
                    },
                    {
                        icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/c9/geili_thumb.gif',
                        value: '[给力]'
                    },
                    {
                        icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/f2/wg_thumb.gif',
                        value: '[围观]'
                    },
                    {
                        icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/70/vw_thumb.gif',
                        value: '[威武]'
                    }
                ]
            }
        };

        // 只粘贴纯文本
        // editor.config.pasteText = true;

        // 跨域上传
        // editor.config.uploadImgUrl = 'http://localhost:8012/upload';

        // 第三方上传
        // editor.config.customUpload = true;

        // 普通菜单配置
        // editor.config.menus = [
        //     'img',
        //     'insertcode',
        //     'eraser',
        //     'fullscreen'
        // ];
        // 只排除某几个菜单（兼容IE低版本，不支持ES5的浏览器），支持ES5的浏览器可直接用 [].map 方法
        // editor.config.menus = $.map(wangEditor.config.menus, function(item, key) {
        //     if (item === 'insertcode') {
        //         return null;
        //     }
        //     if (item === 'fullscreen') {
        //         return null;
        //     }
        //     return item;
        // });

        // onchange 事件
        // editor.onchange = function () {
        //     console.log(this.$txt.html());
        // };

        // 取消过滤js
        // editor.config.jsFilter = false;

        // 取消粘贴过来
        // editor.config.pasteFilter = false;

        // 设置 z-index
        // editor.config.zindex = 20000;

        // 语言
        // editor.config.lang = wangEditor.langs['en'];

        // 自定义菜单UI
        // editor.UI.menus.bold = {
        //     normal: '<button style="font-size:20px; margin-top:5px;">B</button>',
        //     selected: '.selected'
        // };
        // editor.UI.menus.italic = {
        //     normal: '<button style="font-size:20px; margin-top:5px;">I</button>',
        //     selected: '<button style="font-size:20px; margin-top:5px;"><i>I</i></button>'
        // };
        editor.create();
    </script>
    {{--<script>--}}
        {{--$().ready(function () {--}}
            {{--$('#addCat').bootstrapValidator({--}}
                {{--fields: {--}}
                    {{--name: {--}}
                        {{--validators: {--}}
                            {{--notEmpty: {--}}
                                {{--message: '栏目名称不能为空'--}}
                            {{--}--}}
                        {{--}--}}
                    {{--}--}}
                {{--}--}}
            {{--});--}}
            {{--$("#addCat").submit(function(ev){ev.preventDefault();});--}}
            {{--$("button[name=submit]").click(function () {--}}
                {{--var bootstrapValidator = $("#addCat").data('bootstrapValidator');--}}
                {{--bootstrapValidator.validate();--}}
                {{--if(!bootstrapValidator.isValid()){--}}
                    {{--return;--}}
                {{--}--}}
                {{--var cat_order = 0;--}}
                {{--if ($("input[name=order]").val() != "") cat_order = $("input[name=order]").val();--}}
                {{--$.ajax({--}}
                    {{--url: '/admin/addCatOperate',--}}
                    {{--type: 'post',--}}
                    {{--data: {--}}
                        {{--_token: "{{ csrf_token() }}",--}}
                        {{--cat_name: $("input[name=name]").val(),--}}
                        {{--cat_order: cat_order,--}}
                        {{--cat_pid: $("select[name=pid]").val(),--}}
                        {{--cat_seo_title: $("input[name=title]").val(),--}}
                        {{--cat_seo_keyword: $("input[name=keyword]").val(),--}}
                        {{--cat_seo_description: $("textarea[name=description]").val(),--}}
                        {{--cat_url: $("input[name=url]").val(),--}}
                        {{--cat_status: $("input[name=status]:checked").val() ? 1 : 0,--}}
                        {{--cat_page: $("input[name=page]:checked").val() ? 1 : 0,--}}
                        {{--cat_page_content: $("textarea[name=content]").val()--}}
                    {{--},--}}
                    {{--success: function (data) {--}}
                        {{--if (data['status'] === 1) {--}}
                            {{--notify('success',data['msg']);--}}
                            {{--location.reload();--}}
                        {{--}else if (data['status'] === 0){--}}
                            {{--notify('error',data['msg']);--}}
                        {{--}else {--}}
                            {{--notify('error','服务器错误，请稍后再试');--}}
                        {{--}--}}
                    {{--},--}}
                    {{--error: function () {--}}
                        {{--notify('error','服务器错误，请稍后再试');--}}
                    {{--}--}}
                {{--});--}}
            {{--});--}}
        {{--})--}}
    {{--</script>--}}
@endsection