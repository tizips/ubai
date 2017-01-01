<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\Comment;
use App\Model\Vip;
use Request;

class CommentController extends Controller
{
    public function toAddComment() {
//        return Request::all();
//        dd(Request::all());
//        return 'test';
        $vip = new Vip();
        $addVip = $vip->ValidatorVipExists(Request::get('user_name'));
        if (!$addVip) {
            $vipResult = $vip->ValidatorVip(Request::all());
            if (!empty($vipResult)) {
                return $vipResult;
            }
        }
        $comment = new Comment();
        $commentResult = $comment->ValidatorComment(Request::all());
        if (!empty($commentResult)) {
            return $commentResult;
        }
        if (!$vip->ValidatorVipExists(Request::get('user_name'))) {
            $addVip = $vip->addVip();
            if (empty($addVip)) {
                return response('会员添加失败，请稍后重试',403);
            }
        }
        $addCommentResult = $comment -> addComment($addVip->id);
        if (empty($addCommentResult)) {
            return response('评论添加失败，请稍后再试',403);
        }
//        dd($addCommentResult);
//        return $addCommentResult->comment_parent;
        if ($addCommentResult->comment_parent==0) {
            return '<li class="comment even thread-even depth-1 parent" id="comment-981">
            <div id="div-comment-981" class="comment-body">
                <div class="comment-author vcard">
                    <img alt=\'\' src=\''.$addVip->thumb.'\' class=\'avatar avatar-32 photo\' height=\'32\' width=\'32\' />
                    <cite class="fn"><a href=\''.$addVip->user_url.'\' rel=\'external nofollow\' class=\'url\'>'.$addVip->user_name.'</a></cite>
                    <span class="says">说道：</span>
                </div>

                <div class="comment-meta commentmetadata">
                    <a href="http://www.siryin.com/link/comment-page-3#comment-981">
                        '.$addVip->updated_at->format('Y年m月d日 下午H:i').'
                    </a>
                </div>
                <p>'.$addCommentResult->content.'</p>
                <div class="reply">
                    <a rel=\'nofollow\' class=\'comment-reply-link\' href=\'http://www.siryin.com/link?replytocom=981#respond\' onclick=\'return addComment.moveForm( "div-comment-'.$addCommentResult->id.'", "'.$addCommentResult->id.'", "respond", "52" )\' aria-label=\'回复给'.$addVip->user_name.'\'>回复</a>
                </div>
            </div>
        </li>';
        }else{
            return '
                <ul class="children">
                    <li class="comment byuser comment-author-yxs bypostauthor odd alt depth-2" id="comment-982">
                        <div id="div-comment-982" class="comment-body">
                            <div class="comment-author vcard">
                                <img alt=\'\' src=\''.$addVip->thumb.'\' class=\'avatar avatar-32 photo\' height=\'32\' width=\'32\' />
                                <cite class="fn">'.$addVip->user_name.'</cite><span class="says">说道：</span>
                            </div>

                            <div class="comment-meta commentmetadata">
                                <a href="http://www.siryin.com/link/comment-page-3#comment-982">
                                    2016年11月18日 下午6:18
                                </a>
                            </div>

                            <p>@<a href="#comment-981">小萝博客</a>
                            <p>'.$addCommentResult->content.'</p>

                            <div class="reply">
                                <a rel=\'nofollow\' class=\'comment-reply-link\' href=\'http://www.siryin.com/link?replytocom=982#respond\' onclick=\'return addComment.moveForm( "div-comment-982", "982", "respond", "52" )\' aria-label=\'回复给尹先生\'>回复</a>
                            </div>
                        </div>
                    </li><!-- #comment-## -->
                </ul>
            ';
        }

    }
}
