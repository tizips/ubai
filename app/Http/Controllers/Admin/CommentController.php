<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Comment;
use Session;

class CommentController extends Controller
{
    public function index () {
        
        $title = '评论管理';
        $comment = new Comment();
        $info = $comment -> selectCommentPage();
        return view('admin.comment' , compact('title'))
            -> with('user' , Session::get('userInfo'))
            -> with('comment', $info);
    }
}
