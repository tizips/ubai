@extends('layouts.home')

@section('Content')
<div id="pjax">
    <section id="slide">
        <img src="https://ws4.sinaimg.cn/large/e8f236c4jw1f9tdfdwz7zj21jk0dwdl4.jpg">
    </section>
    <main id="main">
        @foreach($art as $article)
        <!--文章列表-->
        <article class="post post-list">
            <div class="info">
                <h2 itemprop="name headline" class="title">
                    <a href="/Art/{{ $article -> id }}">{{ $article -> article_title }}</a>
                </h2>
                <span class="time">{{ $article -> updated_at->diffForHumans() }}</span>
                <span class="comment">{{ $article -> cat_name }}</span>
                <p itemprop="post">
                    {{ $article -> summary }}
                </p>
            </div>
        </article>
        <div class="clearer"></div>
        @endforeach

        <nav class="navigator">
            {!! $page or '' !!}
            {{--<a href="#" ><i class="iconfont">&#xe79e;</i></a>--}}
            {{--<a href="#" ><i class="iconfont">&#xe6ba;</i></a>--}}
        </nav>

        <div class="clearer"></div>
    </main>
</div>

@endsection