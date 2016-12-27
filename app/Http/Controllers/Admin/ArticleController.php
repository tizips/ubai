<?php

namespace App\Http\Controllers\Admin;

use App\Api\Api;
use App\Http\Controllers\Controller;
use App\Jobs\DelArtCache;
use App\Jobs\DelCatCache;
use App\Jobs\UpdateArticleCache;
use App\Jobs\UpdateCategories;
use App\Jobs\UpdateCategoryCache;
use App\Jobs\UpdateIndexCache;
use App\Model\Article;
use App\Model\Category;
use App\Model\Upload;
use App\Tool\ImageDealt;
use App\Tool\UpdateCache;
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
            -> with('cat' , $catInfo);
    }

    public function toUpdateArt() {

        $article = new Article();

        if (!$article -> validatorArtExists(Request::get('id'))) {
            abort('404');
        }
        $article->validatorArticle(Request::get('id'));
        $oldCatId = $article->findArtCat(Request::get('id'));
        $art = $article -> updateArt();
        if (empty($art)) {
            return 'error';
        }
        if (Request::get('article_status') == 2) {
            $artInfo = $article -> findArt(Request::get('id'));
            if (!$artInfo -> delete()) {
                return 'error';
            }else{
                return redirect('admin/dustbin');
            }
        }else {
//            $this->dispatch(new DelCatCache($oldCatId));
//            $updateCache = new UpdateCache();
//            $updateCache -> updateCategory(Request::get('cat_id'));
//            $this->dispatch(new UpdateCategoryCache(Request::get('cat_id')));
            $this->dispatch(new UpdateArticleCache(Request::get('id')));
            $this->dispatch(new UpdateIndexCache());
//            $this->dispatch(new UpdateCategoryCache($oldCatId));
//            if (Request::get('cat_id')!=$oldCatId) {
//                return redirect('admin/editArt/'.Request::get('id'));
//            }
            return redirect('admin/art');
        }

    }

    public function toDustbin($ArtID) {

        $article = new Article();
        if (!$article -> validatorArtExists($ArtID)) {
            abort('404');
        }
        if (!$article -> toDustbin($ArtID)) {
            return 'error';
        }
        $this->dispatch(new DelArtCache($ArtID));
        $this->dispatch(new UpdateIndexCache());
        return redirect('admin/dustbin');

    }

    public function toDelete($ArtID) {

        $article = new Article();
        if (!$article -> validatorArtExists($ArtID)) {
            abort('404');
        }
        if (!$article -> delArt($ArtID)) {
            return 'error';
        }
        $this->dispatch(new DelArtCache($ArtID));
        $this->dispatch(new UpdateIndexCache());
        return redirect('admin/art');
    }

    public function toRestoreArt($ArtID) {

        $article = new Article();

        if (!$article -> validatorDustbinExists($ArtID)) {
            abort('404');
        }
        if (!$article -> restoreArt($ArtID)) {
            return 'error';
        }
//        $this->dispatch(new UpdateArticleCache($ArtID));
//        $this->dispatch(new UpdateIndexCache());
        return redirect('admin/art');
    }
    
    public function toDelDustbin($ArtID) {

        $article = new Article();
        if (!$article -> validatorDustbinExists($ArtID)) {
            abort('404');
        }
        if (!$article -> delDustbin($ArtID)) {

            return 'error';
        }
        return redirect('admin/dustbin');
    }
    
    public function toAddArt() {

        $article = new Article();

        $article -> validatorArticle();

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
            $this->dispatch(new UpdateArticleCache($art->id));
            $this->dispatch(new UpdateIndexCache());
            return redirect('admin/art');
        }
    }

    public function uploadBanner() {

        $upload = new Upload();

        $upload -> field = 'banner';
        $upload -> fileTitle = '';
        $upload -> path = '/upload/article';

        return $upload -> upload();

    }

    public function uploadPic() {

        $upload = new ImageDealt();
        $upload -> field = 'wangEditorH5File';
//        $upload -> fileTitle = '';
        $upload -> path = 'article';

        $picInfo = $upload -> upload();
        $picInfo = json_decode($picInfo);

        return $picInfo -> url;
    }

}
