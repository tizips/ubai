<?php

namespace App\Http\Controllers\Admin;

use App\Api\Api;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Tool\ImageDealt;
use Illuminate\Support\Facades\App;
use Request;
use Session;

class ProfileController extends Controller
{
    public function index () {

        $title = '个人资料';
        return view('admin.profile' , compact('title'))
            -> with('user' , Session::get('userInfo'));
    }

    public function editPwd () {

        $title = '修改密码';
        return view('admin.editPwd' , compact('title'))
            -> with('user' , Session::get('userInfo'));
    }

    public function toUpdateProfile() {

        $Api = new Api();
        $user = new User();
        $validatorResult = $user -> updateValidator();
        if (!empty($validatorResult)) {
            return $validatorResult;
        }
        if (!$user -> updateUser()) {
            $Api -> Message = '修改失败';
        }else{
            $userInfo = $user -> findUserById(Request::get('id'));
            Session::put('userInfo' , $userInfo);
            $Api -> Status = 1;
            $Api -> Message = '修改成功';
        }
        return $Api -> AjaxReturn();

    }

    public function uploadThumb() {


        $thumb = new ImageDealt();

        $thumb -> field = 'uploadThumb';

        $thumb -> path = 'thumb';

        $thumb -> isThumb = true;

        $thumb -> width = 200;
        $thumb -> height = 200;

        return $thumb -> upload();
    }
}
