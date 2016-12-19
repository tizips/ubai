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
            -> with('link' , $linkInfo);
    }

    public function addLink () {
        $title = '添加友链';
        return view('admin.addLink', compact('title'));
    }

    public function editLink ($linkId) {

        $link = new Link();
        if (!$link -> validatorLinkExists($linkId)) {
            abort('404');
        }
        $linkInfo = $link -> findLink($linkId);
//        dd($linkInfo);
        $title = '编辑友链';
        return view('admin.editLink', compact('title'))
            -> with('link' , $linkInfo);
    }

    public function toEditLink() {
//        dd(Request::all());
//        $Api = new Api();
        $link = new Link();
        if (!$link->validatorLinkExists(Request::get('id'))) {
            abort('404');
        }
        $link->validatorEditLink(Request::get('id'));
        if(!$link -> updateLink()){
            return 'error';
        }
        return redirect('admin/link');
    }

    public function toAddLink() {
//        dd(Request::all());
//        $Api = new Api();
        $link = new Link();
        $link -> validatorEditLink();
//        if (!$link -> validatorEditLink()) {
//            return $validatorResult;
//        }
        if (!$link -> addLink()) {
            return 'error';
        }
        return redirect('admin/link');
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
