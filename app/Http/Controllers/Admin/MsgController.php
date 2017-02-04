<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Comment;
use Session;

class MsgController extends Controller
{
    public function index () {
         
        $title = '留言管理';
        $comment = new Comment();
        $info = $comment -> selectMessagePage();
        return view('admin.msg' , compact('title'))
            -> with('user' , Session::get('userInfo'))
            -> with('msg', $info);
    }
}
