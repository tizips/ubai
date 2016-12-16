<?php

namespace App\Http\Controllers\Admin;

use App\Api\Api;
use App\Http\Controllers\Controller;
use App\Jobs\UpdateLinkCache;
use App\Model\Link;
use Session;
use Request;

class LinkController extends Controller
{
    public function index () {

        $link = new Link();
        $title = '友链管理';
        $linkInfo = $link -> selectLinkPage();
        return view('admin.link' , compact('title'))
            -> with('link' , $linkInfo)
            -> with('user' , Session::get('userInfo'));
    }

    public function addLink () {
        $title = '添加友链';
        return view('admin.addLink', compact('title'))
            -> with('user' , Session::get('userInfo'));
    }

    public function editLink ($linkId) {

        $link = new Link();
        if (!$link -> validatorLinkExists($linkId)) {
            return abort('404');
        }
        $linkInfo = $link -> findLink($linkId);
        $title = '编辑友链';
        return view('admin.editLink', compact('title'))
            -> with('link' , $linkInfo)
            -> with('user' , Session::get('userInfo'));
    }

    public function toEditLink() {
        $Api = new Api();
        $link = new Link();
        if (!$link->validatorLinkExists(Request::get('id'))) {
            $Api -> Message = '友链不存在';
            return $Api -> AjaxReturn();
        }
        if(!$link -> updateLink()){
            $Api -> Message = '修改失败';
        }else{
            $this -> store();
            $Api -> Status = 1;
            $Api -> Message = '修改成功';
        }
        return $Api -> AjaxReturn();
    }

    public function toAddLink() {
//        dd(Request::all());
        $Api = new Api();
        $link = new Link();
        $validatorResult = $link -> validatorAddLink();
        if (!empty($validatorResult)) {
            return $validatorResult;
        }
        if (!$link -> addLink()) {
            $Api -> Message = '添加失败';
        }else{
            $this -> store();
            $Api -> Status = 1;
            $Api -> Message = '添加成功';
        }
        return $Api -> AjaxReturn();
    }

    public function delLink() {
        $Api = new Api();
        $link = new Link();
        if (!$link->validatorLinkExists(Request::get('id'))) {
            $Api -> Message = '友链不存在';
            return $Api -> AjaxReturn();
        }
        if (!$link -> delLink()) {
            $Api -> Message = '删除失败';
        }else{
            $this -> store();
            $Api -> Status = 1;
            $Api -> Message = ' 删除成功';
        }
        return $Api -> AjaxReturn();
    }

    public function store() {

        dispatch(new UpdateLinkCache());
    }
}
