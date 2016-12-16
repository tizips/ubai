<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Session;

class CommentController extends Controller
{
    public function index () {
        
        $title = '评论管理';
        return view('admin.comment' , compact('title'))
            -> with('user' , Session::get('userInfo'));
    }
}
