@extends('layouts.home')

@section('title')
    {{ $art->title }} -{{ config('site.web_name','余白') }}
@endsection
@section('Content')
<div id="pjax">
    <main id="main">
        <section id="slide">
            <img src="{{ $art->thumb ? asset($art->thumb) : asset('/upload/article/76520161225151032.jpg') }}">
        </section>
        <!--文章和页面-->
        <article class="post_article single">
            <section id="banner">
                <h1 class="post_title">{{ $art -> title }}</h1>
                <ul class="info">
                    <li>{{ $art->updated_at->format('m月d日') }}</li>
                    <li>暂无评论</li>
                </ul>
            </section>
            {!! $art->content !!}

            <div class="meta">
                <p>— 于 {{ $art->updated_at->format('Y年m月d') }} ，共写了 {{ mb_strlen($art->content , 'UTF-8') }} 字；</p>
                {{--<p>— 本文共有 2 个标签：标签：<a href="#" rel="tag">主题</a>, <a href="#" rel="tag">分享</a></p>--}}
                <p>— 转载 ：<a href="" rel="nofollow">test</a></p>
            </div>

        </article>


        <section class="ending">
            <ul class="sns">
                <li class="github"><a href="{{ $art->github }}" target="_blank"><i class="iconfont">&#xe6bb;</i></a></li>
                {{--<li class="weibo"><a href="http://weibo.com/239320789" target="_blank"><i class="iconfont">&#xe6b5;</i></a></li>--}}
                {{--<li class="tencent"><a href="https://twitter.com/icek1ng_" target="_blank"><i class="iconfont">&#xe65e;</i></a></li>--}}
            </ul>
            <div class="about">
                <a><img alt="{{ $art->author }}" src="{{ $art->user_thumb  }}" class="avatar avatar-80 photo" height="80" width="80"></a>
                <span>{{ $art->author_description }}</span>
            </div>
        </section>

        <!-- You can start editing here. -->

        @include('home.comment')
    </main>
</div>

@endsection