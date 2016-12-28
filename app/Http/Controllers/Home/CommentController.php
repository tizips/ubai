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
//        return 'test';
        $vip = new Vip();
        $vipResult = $vip->ValidatorVip(Request::all());
        if (!empty($vipResult)) {
            return $vipResult;
        }
        $comment = new Comment();
        $commentResult = $comment->ValidatorComment(Request::all());
        if (!empty($commentResult)) {
            return $commentResult;
        }
        $addVip = $vip->addVip();
        if (!empty($addVip)) {
            return response('会员添加失败，请稍后重试',403);
        }
    }
}
