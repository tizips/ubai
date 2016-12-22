<?php

namespace App\Model;

use App\Api\Api;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Validator;
use Request;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use Searchable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
//    protected $dateFormat = "U";
    protected $guarded = [];

    public function updateArt() {
        $artInfo = Request::only('id','title','top','thumb','content','cat_id','seo_keyword','seo_title','seo_description','article_status');
        $artInfo['top'] = empty(Request::get('top')) ? 0 : 1;
        $article = $this -> findArt($artInfo['id']);
        foreach ($artInfo as $key => $value) {
            $article -> $key = $value;
        }
        return $article -> save();
    }

    public function toDustbin($ArtID) {
        
//        $artId = Request::get('id');
        $artInfo = self::find($ArtID);
        return $artInfo -> delete();
    }
    
    public function delArt($ArtID) {

//        $artId = Request::get('id');
        $article = self::find($ArtID);
        return $article -> forceDelete();
    }

    public function delDustbin($ArtID) {
//        $artId = Request::get('id');
        $article = self::onlyTrashed() -> find($ArtID);
        return $article -> forceDelete();
    }

    public function restoreArt($ArtID) {

        $article = self::onlyTrashed() -> find($ArtID);
        $article -> article_status = 1;
        if ($article -> save()) {

            return $article -> restore();
        }else{
            return false;
        }
    }
    
    public function findCountArticle() {
        
        return self::count();
    }

    public function selectUserArticleID ($UserID) {
        return self::select('id')
            ->where('author' , $UserID)
            ->get()
            ->toArray();
    }
    
    public function selectArticle($offset) {

        return self::join('users' , 'articles.author' , '=' , 'users.id')
            ->join('categories' , 'articles.cat_id' , '=' , 'categories.id')
            ->join('articles_status' , 'articles.article_status' , '=' , 'articles_status.id')
            ->select('articles.id' , 'articles.title' ,'categories.cat_name' , 'articles.thumb' , 'articles.content' , 'articles.seo_title' , 'articles.seo_keyword' , 'articles.seo_description' , 'users.name as author' , 'articles.updated_at')
            ->where('article_status' , '=' , 0)
            ->orderBy('id','desc')
            ->take(10)
            ->skip($offset)
            ->get();
    }

    public function selectCatArticle($offset , $CatId) {

        return self::join('users' , 'articles.author' , '=' , 'users.id')
            ->join('categories' , 'articles.cat_id' , '=' , 'categories.id')
            ->join('articles_status' , 'articles.article_status' , '=' , 'articles_status.id')
            ->select('articles.id' , 'articles.title' ,'categories.cat_name' , 'articles.thumb' , 'articles.content' , 'articles.seo_title' , 'articles.seo_keyword' , 'articles.seo_description' , 'users.name as author' , 'articles.updated_at')
            ->where('cat_id' , '=' , $CatId)
            ->orderBy('id','desc')
            ->take(10)
            ->skip($offset)
            ->get();
    }

    public function selectArt() {
        return self::join('users' , 'articles.author' , '=' , 'users.id')
            ->join('categories' , 'articles.cat_id' , '=' , 'categories.id')
            ->join('articles_status' , 'articles.article_status' , '=' , 'articles_status.id')
            ->select('articles.id' , 'articles.title' ,'categories.cat_name' , 'articles.article_status' ,'articles_status.article_status_name' , 'users.name as author' , 'articles.updated_at')
            ->paginate(10);
    }
    
    public function findArt($artId) {
        
        return self::find($artId);
    }

    public function findArtInfo($ArtID) {

        return self::join('users' , 'articles.author' , '=' , 'users.id')
            ->join('categories' , 'articles.cat_id' , '=' , 'categories.id')
            ->select('title','cat_name','articles.thumb','users.pen_name as author','users.thumb as user_thumb','users.github','users.content as author_description','articles.content','articles.seo_title','articles.seo_keyword','articles.seo_description','articles.updated_at')
            ->find($ArtID);
    }

    public function selectDustbin() {
        return self::onlyTrashed()
            ->join('users' , 'articles.author' , '=' , 'users.id')
            ->join('categories' , 'articles.cat_id' , '=' , 'categories.id')
            ->select('articles.id' , 'articles.title' ,'categories.cat_name' , 'users.name as author' , 'articles.deleted_at')
            ->paginate(10);
    }

    public function saveArt() {
//        foreach (Request::except('_token') as $key => $value) {
//            $this -> $key = $value;
//        }
//
//        $userInfo = Session::get('userInfo');
//        $this -> author =   $userInfo['id'];
//        return $this -> save();
        $artInfo = Request::only('title','top','thumb','content','cat_id','seo_keyword','seo_title','seo_description','article_status');
        $artInfo['top'] = Request::get('top') ? 1 : 0;
//        $userInfo = Session::get('userInfo');
        $artInfo['author'] = Auth::user()->id;

        return self::create($artInfo);

    }

    public function validatorArticle($ArtID = 0) {

//        $Api = new Api();
        $validator = Validator::make(Request::except('_token') , [
            'title'     =>  'bail|required|unique:articles,title,'.$ArtID,
            'content'           =>  'required',
            'cat_id'            =>  'bail|required|exists:categories,id'
        ] , [
            'title.required'    =>  '文章标题不能为空',
            'title.unique'  =>   '文章已存在',
            'content.required'          =>  '文章内容不能为空',
            'cat_id.required'           =>  '文章栏目不能为空',
            'cat_id.exists'         =>   '栏目不存在'
        ]);
        
        $validator->validate();
    }
    
    public function validatorArtExists($ArtID) {
        $artInfo = self::where('id' , $ArtID) -> count();
        if (!empty($artInfo)) {
            return true;
        }
    }

    public function validatorDustbinExists($ArtID) {

        $artInfo = self::onlyTrashed() -> where('id' , $ArtID) -> count();

        if (!empty($artInfo)) {
            return true;
        }
    }

}
