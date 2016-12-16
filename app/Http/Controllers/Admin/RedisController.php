<?php

namespace App\Http\Controllers\Admin;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mail\UserNotice;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class RedisController extends Controller
{
    //
    public function index() {
//        return Mail::to('tizips@qq.com')
//                -> send(new UserNotice());
//        return Redis::set('name' , 'tizips@qq.com');
        return Redis::get('name');
    }
}
