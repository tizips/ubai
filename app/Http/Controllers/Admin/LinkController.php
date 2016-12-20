<?php

namespace App\Http\Controllers\Admin;

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

        $title = '编辑友链';
        return view('admin.editLink', compact('title'))
            -> with('link' , $linkInfo);
    }

    public function toEditLink() {

        $link = new Link();
        if (!$link->validatorLinkExists(Request::get('id'))) {
            abort('404');
        }
        $link->validatorEditLink(Request::get('id'));
        if(!$link -> updateLink()){
            return 'error';
        }
        $this->store();
        return redirect('admin/link');
    }

    public function toAddLink() {

        $link = new Link();
        $link -> validatorEditLink();

        if (!$link -> addLink()) {
            return 'error';
        }
        $this->store();
        return redirect('admin/link');
    }

    public function delLink($LinkID) {

        $link = new Link();
        if (!$link->validatorLinkExists($LinkID)) {
            abort('404');
        }
        if (!$link -> delLink($LinkID)) {
            return 'error';
        }
        $this->store();
        return redirect('admin/link');
    }

    public function store() {

        dispatch(new UpdateLinkCache());
    }
}
