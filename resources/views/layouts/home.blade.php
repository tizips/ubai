
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{ config('site.web_name','余白') }}</title>
    <meta name="description"  content="" />
    <meta name="keywords"  content="" />
    <script type='text/javascript' src='https://cdn.staticfile.org/jquery/1.12.3/jquery.min.js'></script>
    <script type='text/javascript' src='https://cdn.staticfile.org/jquery-migrate/1.4.0/jquery-migrate.min.js' defer='defer'></script>
    <link type="image/vnd.microsoft.icon" href="/favicon.ico" rel="shortcut icon">
    <link href="{{ elixir('css/all.min.css') }}" type="text/css" rel="stylesheet" />
    <link href="https://cdn.staticfile.org/nprogress/0.2.0/nprogress.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        @font-face {
            font-family: 'iconfont';
            src: url('//at.alicdn.com/t/font_gy7r75a4di7tx1or.eot');
            src: url('//at.alicdn.com/t/font_gy7r75a4di7tx1or.eot?#iefix') format('embedded-opentype'),
            url('//at.alicdn.com/t/font_gy7r75a4di7tx1or.woff') format('woff'),
            url('//at.alicdn.com/t/font_gy7r75a4di7tx1or.ttf') format('truetype'),
            url('//at.alicdn.com/t/font_gy7r75a4di7tx1or.svg#iconfont') format('svg');
        }
        .iconfont{
            font-family:"iconfont" !important;
            font-size:16px;font-style:normal;
            -webkit-font-smoothing: antialiased;
            -webkit-text-stroke-width: 0.2px;
            -moz-osx-font-smoothing: grayscale;
        }
    </style>
</head>
<body id="null">
<section id="index">
    <header id="header">
        <div class="logo">
            <a href="{{ url('/') }}">{{ config('site.web_name','余白') }}</a>
        </div>
        <div class="search_click"></div>
        <nav id="topMenu" class="menu_click">
            <div class="menu-menu-container">
                <ul id="menu-menu" class="menu">
                    <li><a href="{{ url('/') }}">首页</a></li>
                    @foreach($menu as $val)
                        <li><a @if(!isset($val['child'])) href="{{ $val['cat_url'] ? $val['cat_url'] : '/Cat/'.$val['id'] }}" @endif>{{ $val['cat_name'] }}</a>
                            @if(isset($val['child']))
                                <ul class="sub-menu">
                                    @foreach($val['child'] as $child)
                                        <li><a href="{{ $child['cat_url'] ? $child['cat_url'] : '/Cat/'.$child['id'] }}">{{ $child['cat_name'] }}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                    <li><a href="/link">链接</a></li>
                    <li><a href="/msg">留言</a></li>
                </ul>
            </div>
            <i class="i_1"></i>
            <i class="i_2"></i>
        </nav>
        <div class="lower">
            <nav>
                <div class="menu-menu-1-container">
                    <ul id="menu-menu-2" class="menu">
                        <li class="current-menu-item"><a href="{{ url('/') }}">首页</a></li>
                        @foreach($menu as $val)
                        <li><a @if(!isset($val['child'])) href="{{ $val['cat_url'] ? $val['cat_url'] : '/Cat/'.$val['id'] }}" @endif>{{ $val['cat_name'] }}</a>
                            @if(isset($val['child']))
                            <ul class="sub-menu">
                                @foreach($val['child'] as $child)
                                <li><a href="{{ $child['cat_url'] ? $child['cat_url'] : '/Cat/'.$child['id'] }}">{{ $child['cat_name'] }}</a></li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                        <li><a href="/link">链接</a></li>
                        <li><a href="/msg">留言</a></li>
                    </ul>
                </div>
                <i class="iconfont show-nav">&#xe613;</i>
            </nav><!-- #site-navigation -->
        </div>
    </header>
    @yield('Content')
    <footer id="footer">
        <section class="links_adlink">
            <ul class="container">
                @foreach($link as $val)
                    @if($val->show_bottom == 1)
                <li><a target="_blank" href="{{ $val->web_url }}">{{ $val->web_name }}</a></li>
                    @endif
                @endforeach
                <li><a target="_blank" href="http://www.siryin.com/sitemap.xml">地图</a></li>
                <br />
                <li>我想背上行囊，去远方的他乡。去寻找你的过往，去实现我的梦想。</li>
            </ul>
        </section>
        Theme by <a target="_blank" href="https://www.ubai.me">tizips</a>
        &copy; 2016 <a href="{{ url('/') }}">{{ config('site.web_name','余白') }}</a>
        <a class="back2top"></a>
    </footer>
</section>
<div class="clearer" style="height:1px;"></div>
<div class="search_form">
    <form method="get" action="{{ url('/') }}">
        <p class="micro mb-">你想搜索什么...</p>
        <input class="search_key" name="s" placeholder="Enter search keywords..." type="text" value="">
        <button alt="Search" type="submit">Search</button>
    </form>
    <div class="search_close"></div>
</div>
{{--<link rel='stylesheet' id='wp-markdown-prettify-css'  href='/Static/home/css/prettify.css' type='text/css' media='all' />--}}
<script type='text/javascript'>
    /* <![CDATA[ */
    var ajaxcomment = {"ajax_url":"http:\/\/{{ url('/') }}\/admin-ajax.php","order":"desc","formpostion":"top"};
    /* ]]> */
</script>
<script src="{{ asset('js/comment.js') }}"></script>
<script style="display:none">
    function index_overloaded(){

    }
</script>
<script type='text/javascript' src='//cdn.bootcss.com/jquery/1.8.3/jquery.min.js'></script>
<script src="https://cdn.staticfile.org/jquery.pjax/1.9.6/jquery.pjax.min.js"></script>
<script src="https://cdn.staticfile.org/nprogress/0.2.0/nprogress.min.js"></script>
{{--<script type='text/javascript' src='/Static/home/js/ajax_comment.js'></script>--}}
<script src="{{ asset('js/all.js') }}"></script>
<script>

</script>
</body>

</html>