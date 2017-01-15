@extends('layouts.home')
@section('title')
    {{ config('site.web_name','余白') }}
@endsection
@section('Content')
<div id="pjax">
    <main id="main">
        <section id="slide">
            <img src="https://ws4.sinaimg.cn/large/e8f236c4jw1f9tdfdwz7zj21jk0dwdl4.jpg">
        </section>
        <!--文章和页面-->
        <article class="post_article" itemscope="" itemtype="http://schema.org/BlogPosting">
            <section id="banner">
                <h1 itemprop="name headline" class="post_title">{{ $cat->title }}</h1>
                <ul class="info">
                    {{--<li>2015年03月08日</li>--}}
                    {{--<li>167条评论</li>--}}
                </ul>
            </section>
            {!! $cat->cat_page_content !!}
        </article>

        <!-- You can start editing here. -->
        @if($cat->cat_comment)
        @include('home.comment')
        @endif
        {{--<h3 id="comments">--}}
            {{--167条回应：&#8220;留言&#8221;	</h3>--}}

        {{--<div class="navigation">--}}
            {{--<div class="alignleft">--}}
                {{--<a href="http://www.siryin.com/message/comment-page-5#comments" >&laquo; 先前评论</a></div>--}}
            {{--<div class="alignright"></div>--}}
        {{--</div>--}}

        {{--<ol class="commentlist">--}}
            {{--<li class="comment even thread-even depth-1 parent" id="comment-983">--}}
                {{--<div id="div-comment-983" class="comment-body">--}}
                    {{--<div class="comment-author vcard">--}}
                        {{--<img alt='' src='http://cn.gravatar.com/avatar/84c3952cf2fff4db6e941362a4581cef?s=32&#038;r=g' srcset='http://cn.gravatar.com/avatar/84c3952cf2fff4db6e941362a4581cef?s=64&amp;r=g 2x' class='avatar avatar-32 photo' height='32' width='32' />			<cite class="fn"><a href='http://www.macrr.com/' rel='external nofollow' class='url'>闲鱼</a></cite><span class="says">说道：</span>		</div>--}}

                    {{--<div class="comment-meta commentmetadata"><a href="http://www.siryin.com/message/comment-page-6#comment-983">--}}
                            {{--2016年11月18日 下午6:47</a>		</div>--}}

                    {{--<p>新朋友前来参观</p>--}}

                    {{--<div class="reply"><a rel='nofollow' class='comment-reply-link' href='http://www.siryin.com/message?replytocom=983#respond' onclick='return addComment.moveForm( "div-comment-983", "983", "respond", "108" )' aria-label='回复给闲鱼'>回复</a></div>--}}
                {{--</div>--}}
                {{--<ul class="children">--}}
                    {{--<li class="comment byuser comment-author-yxs bypostauthor odd alt depth-2" id="comment-986">--}}
                        {{--<div id="div-comment-986" class="comment-body">--}}
                            {{--<div class="comment-author vcard">--}}
                                {{--<img alt='' src='http://cn.gravatar.com/avatar/2106e2c3bad17698267dd8d101033491?s=32&#038;r=g' srcset='http://cn.gravatar.com/avatar/2106e2c3bad17698267dd8d101033491?s=64&amp;r=g 2x' class='avatar avatar-32 photo' height='32' width='32' />			<cite class="fn">尹先生</cite><span class="says">说道：</span>		</div>--}}

                            {{--<div class="comment-meta commentmetadata"><a href="http://www.siryin.com/message/comment-page-6#comment-986">--}}
                                    {{--2016年11月18日 下午11:21</a>		</div>--}}

                            {{--<p>@<a href="#comment-983">闲鱼</a>--}}
                            {{--<p>欢迎光临(๑• . •๑)</p>--}}

                            {{--<div class="reply"><a rel='nofollow' class='comment-reply-link' href='http://www.siryin.com/message?replytocom=986#respond' onclick='return addComment.moveForm( "div-comment-986", "986", "respond", "108" )' aria-label='回复给尹先生'>回复</a></div>--}}
                        {{--</div>--}}
                    {{--</li><!-- #comment-## -->--}}
                {{--</ul><!-- .children -->--}}
            {{--</li><!-- #comment-## -->--}}
            {{--<li class="comment even thread-odd thread-alt depth-1 parent" id="comment-974">--}}
                {{--<div id="div-comment-974" class="comment-body">--}}
                    {{--<div class="comment-author vcard">--}}
                        {{--<img alt='' src='http://cn.gravatar.com/avatar/7de7246e9f98cb5c16dfb2a8a86262be?s=32&#038;r=g' srcset='http://cn.gravatar.com/avatar/7de7246e9f98cb5c16dfb2a8a86262be?s=64&amp;r=g 2x' class='avatar avatar-32 photo' height='32' width='32' />			<cite class="fn"><a href='http://www.zzfly.net' rel='external nofollow' class='url'>烟花易冷</a></cite><span class="says">说道：</span>		</div>--}}

                    {{--<div class="comment-meta commentmetadata"><a href="http://www.siryin.com/message/comment-page-6#comment-974">--}}
                            {{--2016年11月17日 上午9:26</a>		</div>--}}

                    {{--<p>博主是石河子大学的么？</p>--}}

                    {{--<div class="reply"><a rel='nofollow' class='comment-reply-link' href='http://www.siryin.com/message?replytocom=974#respond' onclick='return addComment.moveForm( "div-comment-974", "974", "respond", "108" )' aria-label='回复给烟花易冷'>回复</a></div>--}}
                {{--</div>--}}
                {{--<ul class="children">--}}
                    {{--<li class="comment byuser comment-author-yxs bypostauthor odd alt depth-2" id="comment-975">--}}
                        {{--<div id="div-comment-975" class="comment-body">--}}
                            {{--<div class="comment-author vcard">--}}
                                {{--<img alt='' src='http://cn.gravatar.com/avatar/2106e2c3bad17698267dd8d101033491?s=32&#038;r=g' srcset='http://cn.gravatar.com/avatar/2106e2c3bad17698267dd8d101033491?s=64&amp;r=g 2x' class='avatar avatar-32 photo' height='32' width='32' />			<cite class="fn">尹先生</cite><span class="says">说道：</span>		</div>--}}

                            {{--<div class="comment-meta commentmetadata"><a href="http://www.siryin.com/message/comment-page-6#comment-975">--}}
                                    {{--2016年11月17日 上午9:35</a>		</div>--}}

                            {{--<p>@<a href="#comment-974">烟花易冷</a>--}}
                            {{--<p>不是，石河子职业技术学院(技校)</p>--}}

                            {{--<div class="reply"><a rel='nofollow' class='comment-reply-link' href='http://www.siryin.com/message?replytocom=975#respond' onclick='return addComment.moveForm( "div-comment-975", "975", "respond", "108" )' aria-label='回复给尹先生'>回复</a></div>--}}
                        {{--</div>--}}
                    {{--</li><!-- #comment-## -->--}}
                    {{--<li class="comment byuser comment-author-yxs bypostauthor even depth-2" id="comment-976">--}}
                        {{--<div id="div-comment-976" class="comment-body">--}}
                            {{--<div class="comment-author vcard">--}}
                                {{--<img alt='' src='http://cn.gravatar.com/avatar/2106e2c3bad17698267dd8d101033491?s=32&#038;r=g' srcset='http://cn.gravatar.com/avatar/2106e2c3bad17698267dd8d101033491?s=64&amp;r=g 2x' class='avatar avatar-32 photo' height='32' width='32' />			<cite class="fn">尹先生</cite><span class="says">说道：</span>		</div>--}}

                            {{--<div class="comment-meta commentmetadata"><a href="http://www.siryin.com/message/comment-page-6#comment-976">--}}
                                    {{--2016年11月17日 上午10:19</a>		</div>--}}

                            {{--<p>@<a href="#comment-974">烟花易冷</a>--}}
                            {{--<p>还是中专的。</p>--}}

                            {{--<div class="reply"><a rel='nofollow' class='comment-reply-link' href='http://www.siryin.com/message?replytocom=976#respond' onclick='return addComment.moveForm( "div-comment-976", "976", "respond", "108" )' aria-label='回复给尹先生'>回复</a></div>--}}
                        {{--</div>--}}
                    {{--</li><!-- #comment-## -->--}}
                {{--</ul><!-- .children -->--}}
            {{--</li><!-- #comment-## -->--}}
            {{--<li class="comment odd alt thread-even depth-1 parent" id="comment-972">--}}
                {{--<div id="div-comment-972" class="comment-body">--}}
                    {{--<div class="comment-author vcard">--}}
                        {{--<img alt='' src='http://cn.gravatar.com/avatar/eb32ada80f6be49b3d0dad7f232d81a7?s=32&#038;r=g' srcset='http://cn.gravatar.com/avatar/eb32ada80f6be49b3d0dad7f232d81a7?s=64&amp;r=g 2x' class='avatar avatar-32 photo' height='32' width='32' />			<cite class="fn"><a href='http://www.siryin.com/1177' rel='external nofollow' class='url'>白衣</a></cite><span class="says">说道：</span>		</div>--}}

                    {{--<div class="comment-meta commentmetadata"><a href="http://www.siryin.com/message/comment-page-6#comment-972">--}}
                            {{--2016年11月17日 上午9:00</a>		</div>--}}

                    {{--<p>最近怎么消失了 。。</p>--}}

                    {{--<div class="reply"><a rel='nofollow' class='comment-reply-link' href='http://www.siryin.com/message?replytocom=972#respond' onclick='return addComment.moveForm( "div-comment-972", "972", "respond", "108" )' aria-label='回复给白衣'>回复</a></div>--}}
                {{--</div>--}}
                {{--<ul class="children">--}}
                    {{--<li class="comment byuser comment-author-yxs bypostauthor even depth-2" id="comment-973">--}}
                        {{--<div id="div-comment-973" class="comment-body">--}}
                            {{--<div class="comment-author vcard">--}}
                                {{--<img alt='' src='http://cn.gravatar.com/avatar/2106e2c3bad17698267dd8d101033491?s=32&#038;r=g' srcset='http://cn.gravatar.com/avatar/2106e2c3bad17698267dd8d101033491?s=64&amp;r=g 2x' class='avatar avatar-32 photo' height='32' width='32' />			<cite class="fn">尹先生</cite><span class="says">说道：</span>		</div>--}}

                            {{--<div class="comment-meta commentmetadata"><a href="http://www.siryin.com/message/comment-page-6#comment-973">--}}
                                    {{--2016年11月17日 上午9:06</a>		</div>--}}

                            {{--<p>@<a href="#comment-972">白衣</a>--}}
                            {{--<p>大早上的被邮件吵醒了T^T好不开心</p>--}}

                            {{--<div class="reply"><a rel='nofollow' class='comment-reply-link' href='http://www.siryin.com/message?replytocom=973#respond' onclick='return addComment.moveForm( "div-comment-973", "973", "respond", "108" )' aria-label='回复给尹先生'>回复</a></div>--}}
                        {{--</div>--}}
                    {{--</li><!-- #comment-## -->--}}
                {{--</ul><!-- .children -->--}}
            {{--</li><!-- #comment-## -->--}}
            {{--<li class="comment odd alt thread-odd thread-alt depth-1 parent" id="comment-971">--}}
                {{--<div id="div-comment-971" class="comment-body">--}}
                    {{--<div class="comment-author vcard">--}}
                        {{--<img alt='' src='http://cn.gravatar.com/avatar/eb32ada80f6be49b3d0dad7f232d81a7?s=32&#038;r=g' srcset='http://cn.gravatar.com/avatar/eb32ada80f6be49b3d0dad7f232d81a7?s=64&amp;r=g 2x' class='avatar avatar-32 photo' height='32' width='32' />			<cite class="fn"><a href='http://www.siryin.com/1177' rel='external nofollow' class='url'>白衣</a></cite><span class="says">说道：</span>		</div>--}}

                    {{--<div class="comment-meta commentmetadata"><a href="http://www.siryin.com/message/comment-page-6#comment-971">--}}
                            {{--2016年11月17日 上午8:59</a>		</div>--}}

                    {{--<p>最近怎么沉默了，动态近乎是无。。。。。。。。。。。。。</p>--}}

                    {{--<div class="reply"><a rel='nofollow' class='comment-reply-link' href='http://www.siryin.com/message?replytocom=971#respond' onclick='return addComment.moveForm( "div-comment-971", "971", "respond", "108" )' aria-label='回复给白衣'>回复</a></div>--}}
                {{--</div>--}}
                {{--<ul class="children">--}}
                    {{--<li class="comment byuser comment-author-yxs bypostauthor even depth-2" id="comment-977">--}}
                        {{--<div id="div-comment-977" class="comment-body">--}}
                            {{--<div class="comment-author vcard">--}}
                                {{--<img alt='' src='http://cn.gravatar.com/avatar/2106e2c3bad17698267dd8d101033491?s=32&#038;r=g' srcset='http://cn.gravatar.com/avatar/2106e2c3bad17698267dd8d101033491?s=64&amp;r=g 2x' class='avatar avatar-32 photo' height='32' width='32' />			<cite class="fn">尹先生</cite><span class="says">说道：</span>		</div>--}}

                            {{--<div class="comment-meta commentmetadata"><a href="http://www.siryin.com/message/comment-page-6#comment-977">--}}
                                    {{--2016年11月17日 上午10:20</a>		</div>--}}

                            {{--<p>@<a href="#comment-971">白衣</a>--}}
                            {{--<p>太忙了，你信么</p>--}}

                            {{--<div class="reply"><a rel='nofollow' class='comment-reply-link' href='http://www.siryin.com/message?replytocom=977#respond' onclick='return addComment.moveForm( "div-comment-977", "977", "respond", "108" )' aria-label='回复给尹先生'>回复</a></div>--}}
                        {{--</div>--}}
                    {{--</li><!-- #comment-## -->--}}
                {{--</ul><!-- .children -->--}}
            {{--</li><!-- #comment-## -->--}}
            {{--<li class="comment odd alt thread-even depth-1" id="comment-960">--}}
                {{--<div id="div-comment-960" class="comment-body">--}}
                    {{--<div class="comment-author vcard">--}}
                        {{--<img alt='' src='http://cn.gravatar.com/avatar/586dc99982ff3633f79b554727d3c239?s=32&#038;r=g' srcset='http://cn.gravatar.com/avatar/586dc99982ff3633f79b554727d3c239?s=64&amp;r=g 2x' class='avatar avatar-32 photo' height='32' width='32' />			<cite class="fn"><a href='http://www.hao1317.net' rel='external nofollow' class='url'>沈逸</a></cite><span class="says">说道：</span>		</div>--}}

                    {{--<div class="comment-meta commentmetadata"><a href="http://www.siryin.com/message/comment-page-6#comment-960">--}}
                            {{--2016年11月10日 上午10:07</a>		</div>--}}

                    {{--<p>博主你的logo坏了&#8230;</p>--}}

                    {{--<div class="reply"><a rel='nofollow' class='comment-reply-link' href='http://www.siryin.com/message?replytocom=960#respond' onclick='return addComment.moveForm( "div-comment-960", "960", "respond", "108" )' aria-label='回复给沈逸'>回复</a></div>--}}
                {{--</div>--}}
            {{--</li><!-- #comment-## -->--}}
            {{--<li class="comment even thread-odd thread-alt depth-1" id="comment-959">--}}
                {{--<div id="div-comment-959" class="comment-body">--}}
                    {{--<div class="comment-author vcard">--}}
                        {{--<img alt='' src='http://cn.gravatar.com/avatar/586dc99982ff3633f79b554727d3c239?s=32&#038;r=g' srcset='http://cn.gravatar.com/avatar/586dc99982ff3633f79b554727d3c239?s=64&amp;r=g 2x' class='avatar avatar-32 photo' height='32' width='32' />			<cite class="fn"><a href='http://www.hao1317.net' rel='external nofollow' class='url'>沈逸</a></cite><span class="says">说道：</span>		</div>--}}

                    {{--<div class="comment-meta commentmetadata"><a href="http://www.siryin.com/message/comment-page-6#comment-959">--}}
                            {{--2016年11月10日 上午5:57</a>		</div>--}}

                    {{--<p>哈哈我也搬家小鸟云了&#8230;</p>--}}

                    {{--<div class="reply"><a rel='nofollow' class='comment-reply-link' href='http://www.siryin.com/message?replytocom=959#respond' onclick='return addComment.moveForm( "div-comment-959", "959", "respond", "108" )' aria-label='回复给沈逸'>回复</a></div>--}}
                {{--</div>--}}
            {{--</li><!-- #comment-## -->--}}
            {{--<li class="comment odd alt thread-even depth-1 parent" id="comment-925">--}}
                {{--<div id="div-comment-925" class="comment-body">--}}
                    {{--<div class="comment-author vcard">--}}
                        {{--<img alt='' src='http://cn.gravatar.com/avatar/7f9e554baf5e3970699d90d46cdb910d?s=32&#038;r=g' srcset='http://cn.gravatar.com/avatar/7f9e554baf5e3970699d90d46cdb910d?s=64&amp;r=g 2x' class='avatar avatar-32 photo' height='32' width='32' />			<cite class="fn"><a href='http://www.seoyanfa.com/register/5H4UNT9L' rel='external nofollow' class='url'>点我免费快速排名</a></cite><span class="says">说道：</span>		</div>--}}

                    {{--<div class="comment-meta commentmetadata"><a href="http://www.siryin.com/message/comment-page-6#comment-925">--}}
                            {{--2016年10月6日 下午11:08</a>		</div>--}}

                    {{--<p>友情来访，衷心祝福博主：写博开心快乐每一天！</p>--}}

                    {{--<div class="reply"><a rel='nofollow' class='comment-reply-link' href='http://www.siryin.com/message?replytocom=925#respond' onclick='return addComment.moveForm( "div-comment-925", "925", "respond", "108" )' aria-label='回复给点我免费快速排名'>回复</a></div>--}}
                {{--</div>--}}
                {{--<ul class="children">--}}
                    {{--<li class="comment byuser comment-author-yxs bypostauthor even depth-2" id="comment-928">--}}
                        {{--<div id="div-comment-928" class="comment-body">--}}
                            {{--<div class="comment-author vcard">--}}
                                {{--<img alt='' src='http://cn.gravatar.com/avatar/2106e2c3bad17698267dd8d101033491?s=32&#038;r=g' srcset='http://cn.gravatar.com/avatar/2106e2c3bad17698267dd8d101033491?s=64&amp;r=g 2x' class='avatar avatar-32 photo' height='32' width='32' />			<cite class="fn">尹先生</cite><span class="says">说道：</span>		</div>--}}

                            {{--<div class="comment-meta commentmetadata"><a href="http://www.siryin.com/message/comment-page-6#comment-928">--}}
                                    {{--2016年10月6日 下午11:40</a>		</div>--}}

                            {{--<p>@<a href="#comment-925">点我免费快速排名</a>--}}
                            {{--<p>感谢回访?</p>--}}

                            {{--<div class="reply"><a rel='nofollow' class='comment-reply-link' href='http://www.siryin.com/message?replytocom=928#respond' onclick='return addComment.moveForm( "div-comment-928", "928", "respond", "108" )' aria-label='回复给尹先生'>回复</a></div>--}}
                        {{--</div>--}}
                    {{--</li><!-- #comment-## -->--}}
                {{--</ul><!-- .children -->--}}
            {{--</li><!-- #comment-## -->--}}
            {{--<li class="comment odd alt thread-odd thread-alt depth-1 parent" id="comment-919">--}}
                {{--<div id="div-comment-919" class="comment-body">--}}
                    {{--<div class="comment-author vcard">--}}
                        {{--<img alt='' src='http://cn.gravatar.com/avatar/3442066ee97ba08c1019b1941750199b?s=32&#038;r=g' srcset='http://cn.gravatar.com/avatar/3442066ee97ba08c1019b1941750199b?s=64&amp;r=g 2x' class='avatar avatar-32 photo' height='32' width='32' />			<cite class="fn"><a href='http://www.xxinn.com' rel='external nofollow' class='url'>小小驿站</a></cite><span class="says">说道：</span>		</div>--}}

                    {{--<div class="comment-meta commentmetadata"><a href="http://www.siryin.com/message/comment-page-6#comment-919">--}}
                            {{--2016年10月5日 上午12:35</a>		</div>--}}

                    {{--<p>网站又改了哇。看到比较简单</p>--}}

                    {{--<div class="reply"><a rel='nofollow' class='comment-reply-link' href='http://www.siryin.com/message?replytocom=919#respond' onclick='return addComment.moveForm( "div-comment-919", "919", "respond", "108" )' aria-label='回复给小小驿站'>回复</a></div>--}}
                {{--</div>--}}
                {{--<ul class="children">--}}
                    {{--<li class="comment byuser comment-author-yxs bypostauthor even depth-2" id="comment-923">--}}
                        {{--<div id="div-comment-923" class="comment-body">--}}
                            {{--<div class="comment-author vcard">--}}
                                {{--<img alt='' src='http://cn.gravatar.com/avatar/2106e2c3bad17698267dd8d101033491?s=32&#038;r=g' srcset='http://cn.gravatar.com/avatar/2106e2c3bad17698267dd8d101033491?s=64&amp;r=g 2x' class='avatar avatar-32 photo' height='32' width='32' />			<cite class="fn">尹先生</cite><span class="says">说道：</span>		</div>--}}

                            {{--<div class="comment-meta commentmetadata"><a href="http://www.siryin.com/message/comment-page-6#comment-923">--}}
                                    {{--2016年10月6日 下午4:31</a>		</div>--}}

                            {{--<p>@<a href="#comment-919">小小驿站</a>--}}
                            {{--<p>恩恩，比较适合我的风格</p>--}}

                            {{--<div class="reply"><a rel='nofollow' class='comment-reply-link' href='http://www.siryin.com/message?replytocom=923#respond' onclick='return addComment.moveForm( "div-comment-923", "923", "respond", "108" )' aria-label='回复给尹先生'>回复</a></div>--}}
                        {{--</div>--}}
                    {{--</li><!-- #comment-## -->--}}
                {{--</ul><!-- .children -->--}}
            {{--</li><!-- #comment-## -->--}}
            {{--<li class="comment odd alt thread-even depth-1 parent" id="comment-891">--}}
                {{--<div id="div-comment-891" class="comment-body">--}}
                    {{--<div class="comment-author vcard">--}}
                        {{--<img alt='' src='http://cn.gravatar.com/avatar/586dc99982ff3633f79b554727d3c239?s=32&#038;r=g' srcset='http://cn.gravatar.com/avatar/586dc99982ff3633f79b554727d3c239?s=64&amp;r=g 2x' class='avatar avatar-32 photo' height='32' width='32' />			<cite class="fn"><a href='http://www.hao1317.net' rel='external nofollow' class='url'>沈逸</a></cite><span class="says">说道：</span>		</div>--}}

                    {{--<div class="comment-meta commentmetadata"><a href="http://www.siryin.com/message/comment-page-6#comment-891">--}}
                            {{--2016年9月24日 上午4:27</a>		</div>--}}

                    {{--<p>朋友你好，本站域名更换为www.hao1317.net，希望你能修改一下<br />--}}
                        {{--万分感谢！</p>--}}

                    {{--<div class="reply"><a rel='nofollow' class='comment-reply-link' href='http://www.siryin.com/message?replytocom=891#respond' onclick='return addComment.moveForm( "div-comment-891", "891", "respond", "108" )' aria-label='回复给沈逸'>回复</a></div>--}}
                {{--</div>--}}
                {{--<ul class="children">--}}
                    {{--<li class="comment byuser comment-author-yxs bypostauthor even depth-2 parent" id="comment-902">--}}
                        {{--<div id="div-comment-902" class="comment-body">--}}
                            {{--<div class="comment-author vcard">--}}
                                {{--<img alt='' src='http://cn.gravatar.com/avatar/2106e2c3bad17698267dd8d101033491?s=32&#038;r=g' srcset='http://cn.gravatar.com/avatar/2106e2c3bad17698267dd8d101033491?s=64&amp;r=g 2x' class='avatar avatar-32 photo' height='32' width='32' />			<cite class="fn">尹先生</cite><span class="says">说道：</span>		</div>--}}

                            {{--<div class="comment-meta commentmetadata"><a href="http://www.siryin.com/message/comment-page-6#comment-902">--}}
                                    {{--2016年10月2日 下午12:43</a>		</div>--}}

                            {{--<p>@<a href="#comment-891">沈逸</a>--}}
                            {{--<p>已修改=-=最近有点忙，刚看到，不好意思</p>--}}

                            {{--<div class="reply"><a rel='nofollow' class='comment-reply-link' href='http://www.siryin.com/message?replytocom=902#respond' onclick='return addComment.moveForm( "div-comment-902", "902", "respond", "108" )' aria-label='回复给尹先生'>回复</a></div>--}}
                        {{--</div>--}}
                        {{--<ul class="children">--}}
                            {{--<li class="comment odd alt depth-3 parent" id="comment-908">--}}
                                {{--<div id="div-comment-908" class="comment-body">--}}
                                    {{--<div class="comment-author vcard">--}}
                                        {{--<img alt='' src='http://cn.gravatar.com/avatar/586dc99982ff3633f79b554727d3c239?s=32&#038;r=g' srcset='http://cn.gravatar.com/avatar/586dc99982ff3633f79b554727d3c239?s=64&amp;r=g 2x' class='avatar avatar-32 photo' height='32' width='32' />			<cite class="fn"><a href='http://www.hao1317.net' rel='external nofollow' class='url'>沈逸</a></cite><span class="says">说道：</span>		</div>--}}

                                    {{--<div class="comment-meta commentmetadata"><a href="http://www.siryin.com/message/comment-page-6#comment-908">--}}
                                            {{--2016年10月2日 下午2:20</a>		</div>--}}

                                    {{--<p>@<a href="#comment-902">尹先生</a> 你的回复发邮件提醒的插件失效了哦&#8230;</p>--}}

                                    {{--<div class="reply"><a rel='nofollow' class='comment-reply-link' href='http://www.siryin.com/message?replytocom=908#respond' onclick='return addComment.moveForm( "div-comment-908", "908", "respond", "108" )' aria-label='回复给沈逸'>回复</a></div>--}}
                                {{--</div>--}}
                                {{--<ul class="children">--}}
                                    {{--<li class="comment byuser comment-author-yxs bypostauthor even depth-4" id="comment-913">--}}
                                        {{--<div id="div-comment-913" class="comment-body">--}}
                                            {{--<div class="comment-author vcard">--}}
                                                {{--<img alt='' src='http://cn.gravatar.com/avatar/2106e2c3bad17698267dd8d101033491?s=32&#038;r=g' srcset='http://cn.gravatar.com/avatar/2106e2c3bad17698267dd8d101033491?s=64&amp;r=g 2x' class='avatar avatar-32 photo' height='32' width='32' />			<cite class="fn">尹先生</cite><span class="says">说道：</span>		</div>--}}

                                            {{--<div class="comment-meta commentmetadata"><a href="http://www.siryin.com/message/comment-page-6#comment-913">--}}
                                                    {{--2016年10月4日 下午12:25</a>		</div>--}}

                                            {{--<p>@<a href="#comment-908">沈逸</a>--}}
                                            {{--<p>现在好了吗？</p>--}}

                                            {{--<div class="reply"><a rel='nofollow' class='comment-reply-link' href='http://www.siryin.com/message?replytocom=913#respond' onclick='return addComment.moveForm( "div-comment-913", "913", "respond", "108" )' aria-label='回复给尹先生'>回复</a></div>--}}
                                        {{--</div>--}}
                                    {{--</li><!-- #comment-## -->--}}
                                    {{--<li class="comment byuser comment-author-yxs bypostauthor odd alt depth-4" id="comment-914">--}}
                                        {{--<div id="div-comment-914" class="comment-body">--}}
                                            {{--<div class="comment-author vcard">--}}
                                                {{--<img alt='' src='http://cn.gravatar.com/avatar/2106e2c3bad17698267dd8d101033491?s=32&#038;r=g' srcset='http://cn.gravatar.com/avatar/2106e2c3bad17698267dd8d101033491?s=64&amp;r=g 2x' class='avatar avatar-32 photo' height='32' width='32' />			<cite class="fn">尹先生</cite><span class="says">说道：</span>		</div>--}}

                                            {{--<div class="comment-meta commentmetadata"><a href="http://www.siryin.com/message/comment-page-6#comment-914">--}}
                                                    {{--2016年10月4日 下午12:27</a>		</div>--}}

                                            {{--<p>@<a href="#comment-908">沈逸</a>--}}
                                            {{--<p>现在好了吗！</p>--}}

                                            {{--<div class="reply"><a rel='nofollow' class='comment-reply-link' href='http://www.siryin.com/message?replytocom=914#respond' onclick='return addComment.moveForm( "div-comment-914", "914", "respond", "108" )' aria-label='回复给尹先生'>回复</a></div>--}}
                                        {{--</div>--}}
                                    {{--</li><!-- #comment-## -->--}}
                                    {{--<li class="comment byuser comment-author-yxs bypostauthor even depth-4" id="comment-915">--}}
                                        {{--<div id="div-comment-915" class="comment-body">--}}
                                            {{--<div class="comment-author vcard">--}}
                                                {{--<img alt='' src='http://cn.gravatar.com/avatar/2106e2c3bad17698267dd8d101033491?s=32&#038;r=g' srcset='http://cn.gravatar.com/avatar/2106e2c3bad17698267dd8d101033491?s=64&amp;r=g 2x' class='avatar avatar-32 photo' height='32' width='32' />			<cite class="fn">尹先生</cite><span class="says">说道：</span>		</div>--}}

                                            {{--<div class="comment-meta commentmetadata"><a href="http://www.siryin.com/message/comment-page-6#comment-915">--}}
                                                    {{--2016年10月4日 下午12:28</a>		</div>--}}

                                            {{--<p>@<a href="#comment-908">沈逸</a>--}}
                                            {{--<p>现在好了吗！？</p>--}}

                                            {{--<div class="reply"><a rel='nofollow' class='comment-reply-link' href='http://www.siryin.com/message?replytocom=915#respond' onclick='return addComment.moveForm( "div-comment-915", "915", "respond", "108" )' aria-label='回复给尹先生'>回复</a></div>--}}
                                        {{--</div>--}}
                                    {{--</li><!-- #comment-## -->--}}
                                {{--</ul><!-- .children -->--}}
                            {{--</li><!-- #comment-## -->--}}
                        {{--</ul><!-- .children -->--}}
                    {{--</li><!-- #comment-## -->--}}
                {{--</ul><!-- .children -->--}}
            {{--</li><!-- #comment-## -->--}}
            {{--<li class="comment byuser comment-author-yxs bypostauthor odd alt thread-odd thread-alt depth-1" id="comment-886">--}}
                {{--<div id="div-comment-886" class="comment-body">--}}
                    {{--<div class="comment-author vcard">--}}
                        {{--<img alt='' src='http://cn.gravatar.com/avatar/2106e2c3bad17698267dd8d101033491?s=32&#038;r=g' srcset='http://cn.gravatar.com/avatar/2106e2c3bad17698267dd8d101033491?s=64&amp;r=g 2x' class='avatar avatar-32 photo' height='32' width='32' />			<cite class="fn">尹先生</cite><span class="says">说道：</span>		</div>--}}

                    {{--<div class="comment-meta commentmetadata"><a href="http://www.siryin.com/message/comment-page-6#comment-886">--}}
                            {{--2016年9月22日 下午3:08</a>		</div>--}}

                    {{--<p>貌似过去好长时间了，提前祝你十一快乐——</p>--}}

                    {{--<div class="reply"><a rel='nofollow' class='comment-reply-link' href='http://www.siryin.com/message?replytocom=886#respond' onclick='return addComment.moveForm( "div-comment-886", "886", "respond", "108" )' aria-label='回复给尹先生'>回复</a></div>--}}
                {{--</div>--}}
            {{--</li><!-- #comment-## -->--}}
        {{--</ol>--}}

        {{--<div class="navigation">--}}
            {{--<div class="alignleft"><a href="http://www.siryin.com/message/comment-page-5#comments" >&laquo; 先前评论</a></div>--}}
            {{--<div class="alignright"></div>--}}
        {{--</div>--}}

        {{--<div id="respond" class="comment-respond">--}}
            {{--<h3 id="reply-title" class="comment-reply-title">发表评论 <small><a rel="nofollow" id="cancel-comment-reply-link" href="/message#respond" style="display:none;">取消回复</a></small></h3>				<form action="http://www.siryin.com/wp-comments-post.php" method="post" id="commentform" class="comment-form">--}}
                {{--<p class="comment-notes"><span id="email-notes">电子邮件地址不会被公开。</span></p><p class="comment-form-author"><label for="author">姓名</label> <input id="author" name="author" type="text" value="" size="30" maxlength="245" /></p>--}}
                {{--<p class="comment-form-email"><label for="email">电子邮件</label> <input id="email" name="email" type="text" value="" size="30" maxlength="100" aria-describedby="email-notes" /></p>--}}
                {{--<p class="comment-form-url"><label for="url">站点</label> <input id="url" name="url" type="text" value="" size="30" maxlength="200" /></p>--}}
                {{--<p class="comment-form-comment"><label for="comment">评论</label> <textarea id="comment" name="w" cols="45" rows="8" maxlength="65525" aria-required="true" required="required"></textarea><textarea name="comment" cols="100%" rows="4" style="display:none"></textarea></p><p class="form-submit"><input name="submit" type="submit" id="submit" class="submit" value="发表评论" /> <input type='hidden' name='comment_post_ID' value='108' id='comment_post_ID' />--}}
                    {{--<input type='hidden' name='comment_parent' id='comment_parent' value='0' />--}}
                {{--</p>				</form>--}}
        {{--</div><!-- #respond -->--}}
        {{--<div class="clearer"></div>--}}
    </main>
</div>
@endsection