<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Request;
use Session;
use App\Api\Api;

class LoginController extends Controller
{

    public function index()
    {
        $title = 'login';
        return view('admin.login' , compact('title'));
    }
    public function checkLogin ()
    {
        $user = new User();
        $msg = $user -> autoValidator();
        if (!empty($msg)) {
            return $msg;
        }

        $loginApi = new Api();

        $pwd = Request::get('password');
        $userInfo = $user -> findUser();

        if (Hash::check($pwd , $userInfo -> password)) {
            Session::put('userInfo' , $userInfo);
            Session::put('adminLastOperateTime' , time());
            $loginApi -> Status = 1;
            $loginApi -> Message = '登录成功';
        }else{
            $loginApi -> Message = '用户名或密码错误';
        }
        return $loginApi -> AjaxReturn();
    }
    public function loginOut()
    {
        Session::flush();
        return Redirect::to('/login');
    }
    public function lock()
    {
        $title = '锁定';
        return view('admin.lock' , compact('title'));
    }
    public function loginLock()
    {
        Session::put('errors' , '账号已锁定 ，请输入密码后继续操作');
        Session::put('loginLock' , '1');
        return redirect('/lock');
    }
    public function toLock()
    {
        $loginApi = new Api();
        if (empty(Session::has('userInfo'))) {
            Session::put('errors' , '您已退出，请重新登录');
            $loginApi -> Status = 2;
            $loginApi -> Message = "您已退出，请重新登录";
            return $loginApi -> AjaxReturn();
        }
        $userInfo = Session::get('userInfo');
        if (Hash::check(Request::get('password') , $userInfo -> password)) {
            Session::forget('loginLock');
            Session::put('adminLastOperateTime' , time());
            $loginApi -> Status = 1;
            $loginApi -> Message = "登录成功";
        }else{
            $loginApi -> Message = "登录失败";
        }
        return $loginApi -> AjaxReturn();
    }
}
