<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Cache;
use Request;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    public function index() {
        $title = '资源管理';
        return view('admin.file' , compact('title'));
    }
    public function setting() {
        $title = '资源云设置';
        return view('admin.fileSetting' , compact('title'));
    }
    public function toSetting() {
        $is_qiniu = Request::get('isQiniu') ? true : false;
        $bucket = Request::get('bucket');
        $secret_key = Request::get('SecretKey');
        $access_key = Request::get('AccessKey');
        $domain = Request::get('domain');
//        config(['qiniu.isQiniu' => true]);
//        dd(config('qiniu.isQiniu'));
        config([
            'qiniu.isQiniu'       =>      $is_qiniu,
            'qiniu.bucket'        =>      $bucket,
            'qiniu.SecretKey'     =>      $secret_key,
            'qiniu.AccessKey'     =>      $access_key,
            'qiniu.domain'        =>      $domain,
        ]);
//        Cache::forever('qiniu.isQiniu',$is_qiniu);
        return redirect('admin/fileSetting');
    }
}
