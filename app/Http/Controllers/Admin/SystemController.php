<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Session;

class SystemController extends Controller
{
    public function index () {
        $title = '仪盘';
        return view('admin.system' , compact('title'))
            -> with('user' , Session::get('userInfo'));
    }
}
