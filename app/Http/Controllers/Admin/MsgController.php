<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Session;

class MsgController extends Controller
{
    public function index () {
         
        $title = '留言管理';
        return view('admin.msg' , compact('title'))
            -> with('user' , Session::get('userInfo'));
    }
}
