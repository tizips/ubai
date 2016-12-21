<?php

namespace App\Http\Controllers\Admin;

use App\Api\Api;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Tool\ImageDealt;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Request;
use Session;

class ProfileController extends Controller
{
    public function index () {

        $title = '个人资料';
        return view('admin.profile' , compact('title'));
    }

    public function editPwd () {

        $title = '修改密码';
        return view('admin.editPwd' , compact('title'))
            -> with('user' , Session::get('userInfo'));
    }

    public function toUpdateProfile() {

//        dd(Request::all());
//        $Api = new Api();
        $user = new User();
        $user -> ValidatorUser(Request::get('id'));
//        if (!empty($validatorResult)) {
//            return $validatorResult;
//        }
        if (!$user -> updateUser()) {
            return 'error';
        }
        $userInfo = $user->findUser(Request::get('id'));
        Auth::login($userInfo);
        Session::flash('operateInfo' , '资料修改成功');
        return redirect('admin/profile');

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
