@extends('layouts.home')

@section('Content')
<div class="pjax">
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
                <p>- 转载 ：<a href="" rel="nofollow">test</a></p>
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
            {{--<div class="alignleft">--}}
                {{--<a href="http://www.siryin.com/link/comment-page-2#comments" >&laquo; 先前评论</a>--}}
            {{--</div>--}}
            <div class="alignright"></div>
        </div>

        <ol class="commentlist">
            <li class="comment even thread-even depth-1 parent" id="comment-981">
                {{--<div id="div-comment-981" class="comment-body">--}}
                    {{--<div class="comment-author vcard">--}}
                        {{--<img alt='' src='http://cn.gravatar.com/avatar/571f51a0f082025db7216ad983449d0d?s=32&#038;r=g' class='avatar avatar-32 photo' height='32' width='32' />--}}
                        {{--<cite class="fn"><a href='http://www.nameluo.com' rel='external nofollow' class='url'>小萝博客</a></cite>--}}
                        {{--<span class="says">说道：</span>--}}
                    {{--</div>--}}

                    {{--<div class="comment-meta commentmetadata">--}}
                        {{--<a href="http://www.siryin.com/link/comment-page-3#comment-981">--}}
                            {{--2016年11月18日 下午4:49--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<p>麻烦修改一下孟子非博客为小萝博客</p>--}}

                    {{--<div class="reply">--}}
                        {{--<a rel='nofollow' class='comment-reply-link' href='http://www.siryin.com/link?replytocom=981#respond' onclick='return addComment.moveForm( "div-comment-981", "981", "respond", "52" )' aria-label='回复给小萝博客'>回复</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<ul class="children">--}}
                    {{--<li class="comment byuser comment-author-yxs bypostauthor odd alt depth-2" id="comment-982">--}}
                        {{--<div id="div-comment-982" class="comment-body">--}}
                            {{--<div class="comment-author vcard">--}}
                                {{--<img alt='' src='http://cn.gravatar.com/avatar/2106e2c3bad17698267dd8d101033491?s=32&#038;r=g' class='avatar avatar-32 photo' height='32' width='32' />--}}
                                {{--<cite class="fn">尹先生</cite><span class="says">说道：</span>--}}
                            {{--</div>--}}

                            {{--<div class="comment-meta commentmetadata">--}}
                                {{--<a href="http://www.siryin.com/link/comment-page-3#comment-982">--}}
                                    {{--2016年11月18日 下午6:18--}}
                                {{--</a>--}}
                            {{--</div>--}}

                            {{--<p>@<a href="#comment-981">小萝博客</a>--}}
                            {{--<p>好久不见呀，已经修改完毕了</p>--}}

                            {{--<div class="reply">--}}
                                {{--<a rel='nofollow' class='comment-reply-link' href='http://www.siryin.com/link?replytocom=982#respond' onclick='return addComment.moveForm( "div-comment-982", "982", "respond", "52" )' aria-label='回复给尹先生'>回复</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</li><!-- #comment-## -->--}}
                {{--</ul><!-- .children -->--}}
            {{--</li><!-- #comment-## -->--}}
            {{--<li class="comment even thread-odd thread-alt depth-1 parent" id="comment-931">--}}
                {{--<div id="div-comment-931" class="comment-body">--}}
                    {{--<div class="comment-author vcard">--}}
                        {{--<img alt='' src='http://cn.gravatar.com/avatar/08b2775a4a23434e5d30ca08eb4c116c?s=32&#038;r=g' srcset='http://cn.gravatar.com/avatar/08b2775a4a23434e5d30ca08eb4c116c?s=64&amp;r=g 2x' class='avatar avatar-32 photo' height='32' width='32' />			<cite class="fn"><a href='http://www.m1ku.cc/' rel='external nofollow' class='url'>某宅</a></cite><span class="says">说道：</span>		</div>--}}

                    {{--<div class="comment-meta commentmetadata"><a href="http://www.siryin.com/link/comment-page-3#comment-931">--}}
                            {{--2016年10月8日 下午10:15</a>		</div>--}}

                    {{--<p>更换域名了-0- 博主 <a href="http://www.m1ku.cc/" rel="nofollow">http://www.m1ku.cc/</a><br />--}}
                        {{--话说。新主题相当不错啊<br />--}}
                        {{--底部装逼依旧在，我拿走了啊。。。。</p>--}}

                    {{--<div class="reply"><a rel='nofollow' class='comment-reply-link' href='http://www.siryin.com/link?replytocom=931#respond' onclick='return addComment.moveForm( "div-comment-931", "931", "respond", "52" )' aria-label='回复给某宅'>回复</a></div>--}}
                {{--</div>--}}
                {{--<ul class="children">--}}
                    {{--<li class="comment byuser comment-author-yxs bypostauthor odd alt depth-2 parent" id="comment-936">--}}
                        {{--<div id="div-comment-936" class="comment-body">--}}
                            {{--<div class="comment-author vcard">--}}
                                {{--<img alt='' src='http://cn.gravatar.com/avatar/2106e2c3bad17698267dd8d101033491?s=32&#038;r=g' srcset='http://cn.gravatar.com/avatar/2106e2c3bad17698267dd8d101033491?s=64&amp;r=g 2x' class='avatar avatar-32 photo' height='32' width='32' />			<cite class="fn">尹先生</cite><span class="says">说道：</span>		</div>--}}

                            {{--<div class="comment-meta commentmetadata"><a href="http://www.siryin.com/link/comment-page-3#comment-936">--}}
                                    {{--2016年10月8日 下午11:34</a>		</div>--}}

                            {{--<p>@<a href="#comment-931">某宅</a>--}}
                            {{--<p>卧槽，你换域名速度好快呀！</p>--}}

                            {{--<div class="reply"><a rel='nofollow' class='comment-reply-link' href='http://www.siryin.com/link?replytocom=936#respond' onclick='return addComment.moveForm( "div-comment-936", "936", "respond", "52" )' aria-label='回复给尹先生'>回复</a></div>--}}
                        {{--</div>--}}
                        {{--<ul class="children">--}}
                            {{--<li class="comment even depth-3 parent" id="comment-937">--}}
                                {{--<div id="div-comment-937" class="comment-body">--}}
                                    {{--<div class="comment-author vcard">--}}
                                        {{--<img alt='' src='http://cn.gravatar.com/avatar/08b2775a4a23434e5d30ca08eb4c116c?s=32&#038;r=g' srcset='http://cn.gravatar.com/avatar/08b2775a4a23434e5d30ca08eb4c116c?s=64&amp;r=g 2x' class='avatar avatar-32 photo' height='32' width='32' />			<cite class="fn"><a href='http://www.m1ku.cc/' rel='external nofollow' class='url'>某宅</a></cite><span class="says">说道：</span>		</div>--}}

                                    {{--<div class="comment-meta commentmetadata"><a href="http://www.siryin.com/link/comment-page-3#comment-937">--}}
                                            {{--2016年10月8日 下午11:40</a>		</div>--}}

                                    {{--<p>@<a href="#comment-936">尹先生</a> 不换了！<br />--}}
                                        {{--这么可爱的域名，我决定续10年了</p>--}}

                                    {{--<div class="reply"><a rel='nofollow' class='comment-reply-link' href='http://www.siryin.com/link?replytocom=937#respond' onclick='return addComment.moveForm( "div-comment-937", "937", "respond", "52" )' aria-label='回复给某宅'>回复</a></div>--}}
                                {{--</div>--}}
                                {{--<ul class="children">--}}
                                    {{--<li class="comment byuser comment-author-yxs bypostauthor odd alt depth-4" id="comment-938">--}}
                                        {{--<div id="div-comment-938" class="comment-body">--}}
                                            {{--<div class="comment-author vcard">--}}
                                                {{--<img alt='' src='http://cn.gravatar.com/avatar/2106e2c3bad17698267dd8d101033491?s=32&#038;r=g' srcset='http://cn.gravatar.com/avatar/2106e2c3bad17698267dd8d101033491?s=64&amp;r=g 2x' class='avatar avatar-32 photo' height='32' width='32' />			<cite class="fn">尹先生</cite><span class="says">说道：</span>		</div>--}}

                                            {{--<div class="comment-meta commentmetadata"><a href="http://www.siryin.com/link/comment-page-3#comment-938">--}}
                                                    {{--2016年10月8日 下午11:41</a>		</div>--}}

                                            {{--<p>@<a href="#comment-937">某宅</a>--}}
                                            {{--<p>好啊，希望你可以坚持下去</p>--}}

                                            {{--<div class="reply"><a rel='nofollow' class='comment-reply-link' href='http://www.siryin.com/link?replytocom=938#respond' onclick='return addComment.moveForm( "div-comment-938", "938", "respond", "52" )' aria-label='回复给尹先生'>回复</a></div>--}}
                                        {{--</div>--}}
                                    {{--</li><!-- #comment-## -->--}}
                                {{--</ul><!-- .children -->--}}
                            {{--</li><!-- #comment-## -->--}}
                        {{--</ul><!-- .children -->--}}
                    {{--</li><!-- #comment-## -->--}}
                {{--</ul><!-- .children -->--}}
            </li><!-- #comment-## -->
        </ol>

        {{--<div class="navigation">--}}
            {{--<div class="alignleft"><a href="http://www.ubai.me/link/comment-page-2#comments" >&laquo; 先前评论</a></div>--}}
            {{--<div class="alignright"></div>--}}
        {{--</div>--}}
        <!-- If comments are open, but there are no comments. -->


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
                    <label for="author">姓名</label>
                    <input id="author" name="user_name" type="text" value="" size="30" maxlength="245" />
                </p>
                <p class="comment-form-email">
                    <label for="email">电子邮件</label>
                    <input id="email" name="user_email" type="text" value="" size="30" maxlength="100" aria-describedby="email-notes" />
                </p>
                <p class="comment-form-url">
                    <label for="url">站点</label>
                    <input id="url" name="user_url" type="text" value="" size="30" maxlength="200" />
                </p>
                <p class="comment-form-comment">
                    <label for="comment">评论</label>
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