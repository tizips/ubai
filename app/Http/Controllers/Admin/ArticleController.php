<?php

namespace App\Http\Controllers\Admin;

use App\Api\Api;
use App\Http\Controllers\Controller;
use App\Jobs\UpdateIndexCache;
use App\Model\Article;
use App\Model\Category;
use App\Model\Upload;
use Session;
use Request;

class ArticleController extends Controller
{
    public function article () {

        $article = new Article();
        $artList = $article->selectArt();
        $title = '文章管理';
        return view('admin.article' , compact('title'))
            -> with('article' , $artList);
    }

    public function dustbin() {
        $article = new Article();
        $artInfo = $article -> selectDustbin();
        $title = '垃圾箱';
        return view('admin.dustbin' , compact('title'))
            -> with('article' , $artInfo);
    }

    public function addArticle () {
        $title = '添加文章';
        $category = new Category();
        $catInfo = $category -> simpleFind();
        return view('admin.addArticle' , compact('title'))
            -> with('cat' , $catInfo);
    }

    public function editArt($artId) {
        $title = '编辑文章';
        $article = new Article();

        if (!$article -> validatorArtExists($artId)) {
            abort('404');
        }

        $category = new Category();
        $catInfo = $category -> simpleFind();
        $artInfo = $article -> findArt($artId);
        return view('admin.editArt' , compact('title')) 
            -> with('article' , $artInfo) 
            -> with('cat' , $catInfo)
            -> with('user' , Session::get('userInfo'));
    }

    public function toUpdateArt() {

//        $Api = new Api();
        $article = new Article();

        if (!$article -> validatorArtExists(Request::get('id'))) {
            abort('404');
        }
        $article->validatorArticle(Request::get('id'));

        $art = $article -> updateArt();
        if (empty($art)) {
            return 'error';
        }
        if (Request::get('article_status') == 2) {
            $artInfo = $article -> findArt(Request::get('id'));
            if (!$artInfo -> delete()) {
                return 'error';
            }else{
//                $this -> store();
                return redirect('admin/dustbin');
//                $Api -> Status = 1;
//                $Api -> Message = '移至垃圾箱成功';
            }
        }else {
//            $this -> store();
            return redirect('admin/art');
//            $Api -> Status = 1;
//            $Api -> Message = '保存草稿成功';
        }

//        return $Api -> AjaxReturn();
    }

    public function toDustbin($ArtID) {

//        $Api = new Api();
//        $artId = Request::get('id');
        $article = new Article();
        if (!$article -> validatorArtExists($ArtID)) {
            abort('404');
        }
        if (!$article -> toDustbin($ArtID)) {
//            $Api -> Message = '移至垃圾箱失败';
            return 'error';
        }
        return redirect('admin/dustbin');
//        $this -> store();
//        $Api -> Status = 1;
//        $Api -> Message = '移至垃圾箱成功';
//        return $Api -> AjaxReturn();

    }

    public function toDelete($ArtID) {

//        $Api = new Api();
//        $artId = Request::get('id');
        $article = new Article();
        if (!$article -> validatorArtExists($ArtID)) {
            abort('404');
        }
        if (!$article -> delArt($ArtID)) {
            return 'error';
        }
//        $this -> store();
        return redirect('admin/art');
//        $Api -> Status = 1;
//        $Api -> Message = '删除成功';
//        return $Api -> AjaxReturn();
    }

    public function toRestoreArt($ArtID) {

//        $Api = new Api();
//        $artId = Request::get('id');
        $article = new Article();
//        dd($ArtID);
        if (!$article -> validatorDustbinExists($ArtID)) {
            abort('404');
        }
        if (!$article -> restoreArt($ArtID)) {
            return 'error';
        }
//        $this -> store();
        return redirect('admin/art');
//        $Api -> Status = 1;
//        $Api -> Message = '还原成功';
//        return $Api -> AjaxReturn();
    }
    
    public function toDelDustbin($ArtID) {

//        $Api = new Api();
//        $artId = Request::get('id');
        $article = new Article();
        if (!$article -> validatorDustbinExists($ArtID)) {
            abort('404');
//            $Api -> Message = '垃圾箱中不存在此文章';
//            return $Api -> AjaxReturn();
        }
        if (!$article -> delDustbin($ArtID)) {

            return 'error';
//            $Api -> Message = '删除失败';
//            return $Api -> AjaxReturn();
        }
        return redirect('admin/dustbin');
//        $Api -> Status = 1;
//        $Api -> Message = '删除成功';
//        return $Api -> AjaxReturn();
    }
    
    public function toAddArt() {
//        dd(Request::only('article_title','top','thumb','content','category','seo_keyword','seo_title','seo_description','article_status'));
//        $Api = new Api();
        $article = new Article();

        $article -> validatorArticle();

//        if (!empty($validatorResult)) {
//            return $validatorResult;
//        }

        $art = $article -> saveArt();

        if (empty($art)) {
            return 'error';
        }
        if (Request::get('article_status') == 2) {
            if (!$art -> delete()) {
                return 'error';
            }else{
                return redirect('admin/dustbin');
            }
        }else {
            return redirect('admin/art');
        }

//        return $Api -> AjaxReturn();

    }

    public function uploadBanner() {

        $upload = new Upload();

        $upload -> field = 'banner';
        $upload -> fileTitle = '';
        $upload -> path = '/upload/article';

        return $upload -> upload();

    }

    public function uploadPic() {

        $upload = new Upload();
        $upload -> field = 'wangEditorH5File';
        $upload -> fileTitle = '';
        $upload -> path = '/upload/article';

        $picInfo = $upload -> upload();
        $picInfo = json_decode($picInfo);

        return $picInfo -> url;
    }

    public function store() {
        dispatch(new UpdateIndexCache());
    }
}
