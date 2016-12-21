<?php

namespace App\Model;

use App\Api\Api;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Scout\Searchable;
use Validator;
use Request;

class Link extends Model
{

    use Searchable;

//    public $dateFormat = "U";
    protected $guarded = [];

    public function selectLinkPage() {
        return self::join('users' , 'links.operate_user' , '=' , 'users.id')
            ->join('links_status' , 'links.web_status' , '=' , 'links_status.id')
            ->select('links.*' , 'users.name as operate_user_name' , 'links_status.link_status_name')
            ->orderby('web_order')
            ->orderby('id' , 'ASC')
            ->paginate(10);
    }

    public function selectLink() {

        return self::select('web_name' ,'web_url' ,'web_admin' ,'show_bottom' ,'web_logo' , 'web_description')
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

        $input = Request::only('web_name','web_url','web_admin','web_email','web_logo','web_order','web_description','show_bottom','web_status');
        $input['web_order'] = $input['web_order'] ? $input['web_order'] : 50;
        $input['web_status'] = $input['web_status'] ? 1 : 0;
        $input['show_bottom'] = $input['show_bottom'] ? 1 : 0;
        $input['operate_user']  = Auth::id();

        return self::create($input);
    }

    public function updateLink() {
        $linkInfo = Request::only(['id','web_admin','web_description','web_email','web_logo','web_name','web_order','show_bottom','web_status','web_url']);
        $linkInfo['web_order'] = $linkInfo['web_order'] ? $linkInfo['web_order'] : 50;
        $linkInfo['web_status'] = $linkInfo['web_status'] ? 1 : 0;
        $linkInfo['show_bottom'] = $linkInfo['show_bottom'] ? 1 : 0;
        $link = self::select('web_admin','web_description','web_email','web_logo','web_name','operate_user','web_order','show_bottom','web_status','web_url')
            ->find($linkInfo['id']);

        foreach ($linkInfo as $key => $val) {
            $link -> $key = $val;
        }

        $link -> operate_user = Auth::id();

        return $link->save();

    }

    public function delLink($LinkID) {
        return $this -> destroy($LinkID);
    }

    public function validatorEditLink($LinkID = 0) {

        $validator = Validator::make(Request::except('_token') , [
            'web_name'  =>  'bail|required|unique:links,web_name,'.$LinkID,
            'web_url'   =>  'bail|required|url|unique:links,web_url,'.$LinkID,
            'web_admin' =>  'required',
            'web_email' =>  'sometimes|required|email|unique:links,web_email,'.$LinkID
        ] , [
            'web_name.required'     =>      '网站名称不能为空',
            'web_name.unique'       =>      '友链名称已经存在',
            'web_url.required'      =>      '友链链接不能为空',
            'web_url.url'           =>      '请输入正确的友链',
            'web_url.unique'        =>      '友链链接已经存在',
            'web_admin.required'    =>      '网站管理员不能为空',
            'web_email.required'    =>      '管理员联系邮箱不能为空',
            'web_email.email'       =>      '请输入正确的 E-mail 地址',
            'web_email.unique'      =>      '友链管理员邮箱已经存在',
        ]);
        $validator->validate();
    }

    public function validatorLinkExists($linkId) {
        $linkInfo = self::where('id' , $linkId) -> count();
        if (!empty($linkInfo)) {
            return true;
        }
    }
}
