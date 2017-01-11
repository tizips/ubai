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

        <h3 id="comments">
            0条回应：&#8220;{{ $art->author.' - '.$art->title }}&#8221;	</h3>

        <div class="navigation">
            <div class="alignTop">
                <a href="{{ url()->previous() }}#comments" ><i class="iconfont">&#xe60c;</i></a>
            </div>
            <div class="alignBottom"></div>
        </div>

        <ol class="commentlist">
            @if(!empty($comment))
                @foreach($comment as $val)
            <li class="comment even thread-even depth-1 parent" id="comment-{{ $val['comment_id'] }}">
                <div id="div-comment-{{ $val['comment_id'] }}" class="comment-body">
                    <div class="comment-author vcard">
                        <img alt='' src='{{ $val['comment_user_thumb'] }}' class='avatar avatar-32 photo' height='32' width='32' />
                        <cite class="fn"><a href='{{ $val['comment_user_url'] }}' rel='external nofollow' class='url'>{{ $val['comment_user_name'] }}</a></cite>
                        <span class="says">说道：</span>
                    </div>

                    <div class="comment-meta commentmetadata">
                        <a href="{{ url()->current() }}#comment-{{ $val['comment_id'] }}">
                            {{ $val['created_at'] }}
                        </a>
                    </div>
                    <p>{{ $val['comment_content'] }}</p>

                    <div class="reply">
                        <a rel='nofollow' class='comment-reply-link' href='{{ url()->previous() }}?replytocom={{ $val['comment_id'] }}#respond' onclick='return addComment.moveForm( "div-comment-{{ $val['comment_id'] }}", "{{ $val['comment_id'] }}", "respond", "52" )' aria-label='回复给{{ $val['comment_user_name'] }}'>回复</a>
                    </div>
                </div>
                @if (!empty($val['child']))
                    {{ \App\Tool\CommentDealt::showChildComment($val['child']) }}
                @endif

            </li><!-- #comment-## -->
                @endforeach
            @endif
        </ol>

        {{--<div class="navigation">--}}
            {{--<div class="alignleft"><a href="http://www.ubai.me/link/comment-page-2#comments" >&laquo; 先前评论</a></div>--}}
            {{--<div class="alignright"></div>--}}
        {{--</div>--}}

        <div id="respond" class="comment-respond">
            <h3 id="reply-title" class="comment-reply-title">发表评论
                <small>
                    <a rel="nofollow" id="cancel-comment-reply-link" href="{{ url('Art/'.$art->id) }}#respond" style="display:none;">取消回复</a>
                </small>
            </h3>
            <form action="{{ url('toComment') }}" method="post" id="commentform" class="comment-form">
                {{ csrf_field() }}
                <p class="comment-notes">
                    <span id="email-notes">电子邮件地址不会被公开。</span>
                </p>
                <p class="comment-form-author">
                    <label for="author">姓名 <span class="required">*</span></label>
                    <input id="author" name="user_name" type="text" value="" size="30" maxlength="245" />
                </p>
                <p class="comment-form-email">
                    <label for="email">电子邮件 <span class="required">*</span></label>
                    <input id="email" name="user_email" type="text" value="" size="30" maxlength="100" aria-describedby="email-notes" />
                </p>
                <p class="comment-form-url">
                    <label for="url">站点</label>
                    <input id="url" name="user_url" type="text" value="" size="30" maxlength="200" />
                </p>
                <p class="comment-form-comment">
                    <label for="comment">评论 <span class="required">*</span></label>
                    <textarea id="comment" name="content" cols="45" rows="8" maxlength="65525" aria-required="true" required="required"></textarea>
                    <textarea name="comment" cols="100%" rows="4" style="display:none"></textarea>
                </p>
                <p class="form-submit">
                    <input name="submit" type="submit" id="submit" class="submit" value="发表评论" />
                    <input type='hidden' name='comment_post_id' value='{{ $art->id }}' id='comment_post_ID' />
                    <input type='hidden' name='comment_parent' id='comment_parent' value='0' />
                </p>
            </form>
        </div><!-- #respond -->
        <div class="clearer"></div>
    </main>
</div>

@endsection