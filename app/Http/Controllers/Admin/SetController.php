<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Session;

class SetController extends Controller
{
    public function index () {

        $title = '系统设置';
        return view('admin.setting' , compact('title'))
            -> with('user' , Session::get('userInfo'));
    }
}
