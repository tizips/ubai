@extends('layouts.admin')
@section('Style')
    <link rel="stylesheet" href="/Static/Editor/css/wangEditor.min.css">
    <link href="https://cdn.bootcss.com/bootstrap-fileinput/4.3.5/css/fileinput.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <form id="addCat" class="form-horizontal">
                <div class="col-md-12">
                    <div class="card">
                        <div class="content">
                            <ul role="tablist" class="nav nav-tabs">
                                <li role="presentation" class="active">
                                    <a href="#catRoutine" data-toggle="tab"><i class="iconfont">&#xe66a;</i> 首页</a>
                                </li>
                                <li>
                                    <a href="#catSEO" data-toggle="tab"><i class="iconfont">&#xe60d;</i> 栏目</a>
                                </li>
                                <li>
                                    <a href="#CatCont" data-toggle="tab"><i class="iconfont">&#xe64e;</i> 文章</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="catRoutine" class="tab-pane active">
                                    <div class="card">
                                        <div class="header">更新首页</div>
                                        <div class="content">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <p>
                                                        站点首页内容将会被更新<br />
                                                        首页其他分页内容自动更新
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <a href="/admin/cache/updateIndex" target="_blank" class="btn btn-info btn-wd">更新主页</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="catSEO" class="tab-pane">
                                    <div class="card">
                                        <div class="header">更新栏目</div>
                                        <div class="content">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <select name="pid" class="selectpicker" data-title="栏目" data-style="btn-default btn-block btn-info btn-fill" data-menu-style="dropdown-blue">
                                                        <option value="0" selected>全部栏目</option>
                                                        @foreach($cat as $val)
                                                            <option value="{{ $val['id'] }}">{{ $val['cat_title'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-10">
                                                    <button name="submit" class="btn btn-info btn-wd">更新栏目</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="CatCont" class="tab-pane">
                                    <div class="card">
                                        <div class="header">更新文章</div>
                                        <div class="content">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="nav-container">
                                                        <ul class="nav nav-icons" role="tablist">
                                                            <li class="active">
                                                                <a href="#description-logo" role="tab" data-toggle="tab">
                                                                    <i class="fa fa-info-circle"></i><br>
                                                                    更新所有文章
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#map-logo" role="tab" data-toggle="tab">
                                                                    <i class="fa fa-map-marker"></i><br>
                                                                    文章 ID 更新
                                                                </a>
                                                            </li>
                                                            <li class="">
                                                                <a href="#legal-logo" role="tab" data-toggle="tab">
                                                                    <i class="fa fa-legal"></i><br>
                                                                    指定时间所有更新
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="description-logo">
                                                            <div class="card">
                                                                <div class="header">
                                                                    <h4 class="title">Description about product</h4>
                                                                    <p class="category">More information here</p>
                                                                </div>

                                                                <div class="content">
                                                                    <p>Larger, yet dramatically thinner. More powerful, but remarkably power efficient. With a smooth metal surface that seamlessly meets the new Retina HD display.</p>
                                                                    <p>The first thing you notice when you hold the phone is how great it feels in your hand. There are no distinct edges. No gaps. Just a smooth, seamless bond of metal and glass that feels like one continuous surface.</p>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="tab-pane" id="map-logo">
                                                            <div class="card">
                                                                <div class="header">
                                                                    <h4 class="title">Location of product</h4>
                                                                    <p class="category">Here is some text</p>
                                                                </div>

                                                                <div class="content">
                                                                    <p>Another Text. The first thing you notice when you hold the phone is how great it feels in your hand. The cover glass curves down around the sides to meet the anodized aluminum enclosure in a remarkable, simplified design.</p>
                                                                    <p>Larger, yet dramatically thinner.It’s one continuous form where hardware and software function in perfect unison, creating a new generation of phone that’s better by any measure.</p>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="tab-pane" id="legal-logo">
                                                            <div class="card">
                                                                <div class="header">
                                                                    <h4 class="title">Legal items</h4>
                                                                    <p class="category">More information here</p>
                                                                </div>

                                                                <div class="content">
                                                                    <p>The first thing you notice when you hold the phone is how great it feels in your hand. The cover glass curves down around the sides to meet the anodized aluminum enclosure in a remarkable, simplified design.</p>
                                                                    <p>Larger, yet dramatically thinner.It’s one continuous form where hardware and software function in perfect unison, creating a new generation of phone that’s better by any measure.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <button name="submit" class="btn btn-info btn-wd">更新文章</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    <script src="/Static/Editor/js/wangEditor.min.js"></script>
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
                data: './emotions.data'
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
    <script>
        $().ready(function () {
            $('#addCat').bootstrapValidator({
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: '栏目名称不能为空'
                            }
                        }
                    }
                }
            });
            $("#addCat").submit(function(ev){ev.preventDefault();});
            $("button[name=submit]").click(function () {
                var bootstrapValidator = $("#addCat").data('bootstrapValidator');
                bootstrapValidator.validate();
                if(!bootstrapValidator.isValid()){
                    return;
                }
                var cat_order = 0;
                if ($("input[name=order]").val() != "") cat_order = $("input[name=order]").val();
                $.ajax({
                    url: '/admin/addCatOperate',
                    type: 'post',
                    data: {
                        _token: "{{ csrf_token() }}",
                        cat_name: $("input[name=name]").val(),
                        cat_order: cat_order,
                        cat_pid: $("select[name=pid]").val(),
                        cat_seo_title: $("input[name=title]").val(),
                        cat_seo_keyword: $("input[name=keyword]").val(),
                        cat_seo_description: $("textarea[name=description]").val(),
                        cat_url: $("input[name=url]").val(),
                        cat_status: $("input[name=status]:checked").val() ? 1 : 0,
                        cat_page: $("input[name=page]:checked").val() ? 1 : 0,
                        cat_page_content: $("textarea[name=content]").val()
                    },
                    success: function (data) {
                        if (data['status'] === 1) {
                            notify('success',data['msg']);
                            location.reload();
                        }else if (data['status'] === 0){
                            notify('error',data['msg']);
                        }else {
                            notify('error','服务器错误，请稍后再试');
                        }
                    },
                    error: function () {
                        notify('error','服务器错误，请稍后再试');
                    }
                });
            });
        })
    </script>
@endsection