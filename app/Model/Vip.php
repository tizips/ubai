<?php

namespace App\Model;

use Validator;
use Illuminate\Database\Eloquent\Model;
use Request;

class Vip extends Model
{
    protected $guarded = [];
    public function addVip() {
        $input = Request::only('user_name','user_email','user_url','thumb');
        $input['thumb'] = 'https://gravatar.css.network/avatar/'.md5($input['user_email']).'.jpg?s=32';
        return self::create($input);
    }
    public function findVip() {

    }
    public function ValidatorVipExists($vip) {
        return self::where('user_name','=',$vip)->first();
    }
    public function ValidatorVip($vip) {
        $validator = Validator::make($vip , [
            'user_name'     =>      'required|unique:vips,user_name',
            'user_email'    =>      'required|email|unique:vips,user_email',
            'user_url'      =>      'sometimes|url|unique:vips,user_url'
        ] ,[
            'user_name.required'    =>      '姓名不能为空',
            'user_name.unique'      =>      '姓名已存在',
            'user_email.required'   =>      '电子邮箱不能为空',
            'user_email.email'      =>      '电子邮箱格式不正确',
            'user_email.unique'     =>      '电子邮箱已存在',
            'user_url.url'          =>      '站点格式不正确',
            'user_url.unique'       =>      '站点已存在',
        ]);
//        $validator->validate();
        if ($validator->fails()) {
//            return [
//                'error'     =>  $validator->errors()->first()
//            ];
            return response($validator->errors()->first(),403);
        }
    }
}
