<?php

namespace App\Model;

use App\Api\Api;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Laravel\Scout\Searchable;
use Validator;
use Request;

class Link extends Model
{

    use Searchable;

    public $dateFormat = "U";

    public function selectLinkPage() {
        return self::join('users' , 'links.operate_user' , '=' , 'users.id')
            ->join('links_status' , 'links.web_status' , '=' , 'links_status.id')
            ->select('links.*' , 'users.name as operate_user_name' , 'links_status.link_status_name')
            ->orderby('web_order')
            ->orderby('id' , 'ASC')
            ->paginate(10);
    }

    public function selectLink() {

        return self::select('web_name' ,'web_url' ,'web_admin' ,'web_logo' , 'web_description')
            ->where('web_status' , '=' , 0)
            ->orderBy('web_order' , 'asc')
            ->get();
    }

    public function findLink($linkId) {

        return self::join('users' , 'links.operate_user' , '=' , 'users.id')
            ->join('links_status' , 'links.web_status' , '=' , 'links_status.id')
            ->select('links.*' , 'users.name as operate_user_name' , 'links_status.link_status_name')
            ->find($linkId);
    }

    public function addLink() {

        $input = Request::except('_token');
        if (empty($input['web_order'])) $input['web_order'] = 50;
        foreach ($input as $key => $val) {
            $this -> $key = $val;
        }
        $userInfo = Session::get('userInfo');
        $this -> operate_user = $userInfo -> id;
        return $this->save();
    }

    public function updateLink() {
        $linkInfo = Request::only(['id','web_admin','web_description','web_email','web_logo','web_name','web_order','web_status','web_url']);
        $link = self::select('web_admin','web_description','web_email','web_logo','web_name','operate_user','web_order','web_status','web_url')
            ->find($linkInfo['id']);

        foreach ($linkInfo as $key => $val) {
            $link -> $key = $val;
        }

        $userInfo = Session::get('userInfo');
        $link -> operate_user = $userInfo -> id;

        return $link->save();

    }

    public function delLink() {
        return $this -> destroy(Request::get('id'));
    }

    public function validatorAddLink() {
        $Api = new Api();
        $validator = Validator::make(Request::except('_token') , [
            'web_name'  =>  'required',
            'web_url'   =>  'active_url',
            'web_admin' =>  'required',
            'web_email' =>  'required|email'
        ] , [
            'web_name.required'     =>      '网站名称不能为空',
            'web_url.active_url'    =>      '请输入正确的友链',
            'web_admin.required'    =>      '网站管理员不能为空',
            'web_email.required'    =>      '管理员联系邮箱不能为空',
            'web_email.email'       =>      '请输入正确的 E-mail 地址'
        ]);
        if ($validator -> fails()) {
            $Api -> Message = $validator -> errors() -> first();
            return $Api -> AjaxReturn();
        }
        $validator = Validator::make(Request::except('_token') , [
            'web_name'      =>      'unique:links',
            'web_url'       =>      'unique:links',
            'web_email'     =>      'unique:links',
        ] , [
            'web_name.unique'       =>      '友链名称已经存在',
            'web_url.unique'        =>      '友链链接已经存在',
            'web_email.unique'      =>      '友链管理员邮箱已经存在'
        ]);
        if ($validator -> fails()) {
            $Api -> Message = $validator -> errors() -> first();
            return $Api -> AjaxReturn();
        }
    }

    public function validatorLinkExists($linkId) {
        $linkInfo = self::where('id' , $linkId) -> count();
        if (!empty($linkInfo)) {
            return true;
        }else{
            return false;
        }
    }
}
