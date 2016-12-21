<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;
use Request;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function findUser($UserID) {
        return self::find($UserID);
    }
    public function updateUser () {
        $input = Request::only('id','pen_name','thumb','email','github','content');
        $user = self::select('pen_name','thumb','email','github','content')
            ->find($input['id']);
        foreach ($input as $key => $value) {
            $user -> $key = $value;
        }
        return $user -> save();
    }

    public function ValidatorUser ($UserID = 0) {

        $validator = Validator::make(Request::except('_token'),[
            'pen_name'  =>      'sometimes|unique:users,pen_name,'.$UserID,
            'email'     =>      'email|unique:users,email,'.$UserID,
            'github'    =>      'sometimes|url',
        ],[
            'pen_name.unique'  =>  '笔名已存在',
            'email.email'       =>  '邮箱格式错误',
            'email.unique'      =>  '邮箱已存在',
            'github.url' =>  'Github 格式不正确'
        ]);
        $validator->validate();
    }
}
