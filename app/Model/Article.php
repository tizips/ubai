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

    /**        更新文章信息
     * @return mixed 返回文章是否更新完成
     */
    public function updateArt() {
        $artInfo = Request::only('id','title','top','thumb','content','cat_id','seo_keyword','seo_title','seo_description','article_status');
        $artInfo['top'] = empty(Request::get('top')) ? 0 : 1;
        $article = $this -> findArt($artInfo['id']);
        foreach ($artInfo as $key => $value) {
            $article -> $key = $value;
        }
        return $article -> save();
    }

    /**       根据文章 ID ，将文章移至垃圾箱
     * @param $ArtID
     * @return mixed 返回文章是否移至垃圾箱
     */
    public function toDustbin($ArtID) {
        
//        $artId = Request::get('id');
        $artInfo = self::find($ArtID);
        return $artInfo -> delete();
    }

    /**       根据文章 ID ，将文章彻底删除
     * @param $ArtID
     * @return mixed 返回文章是否彻底删除
     */
    public function delArt($ArtID) {

//        $artId = Request::get('id');
        $article = self::find($ArtID);
        return $article -> forceDelete();
    }

    /**       根据文章 ID ，将文章从垃圾箱中删除
     * @param $ArtID
     * @return mixed 返回文章是否从垃圾箱中删除
     */
    public function delDustbin($ArtID) {
//        $artId = Request::get('id');
        $article = self::onlyTrashed() -> find($ArtID);
        return $article -> forceDelete();
    }

    /**       根据文章 ID ，将文章从垃圾箱中还原
     * @param $ArtID
     * @return bool 返回文章是否从垃圾箱中还原
     */
    public function restoreArt($ArtID) {

        $article = self::onlyTrashed() -> find($ArtID);
        $article -> article_status = 1;
        if ($article -> save()) {

            return $article -> restore();
        }else{
            return false;
        }
    }

    /**
     * @return mixed 返回文章总数（不包含垃圾箱中的部分）
     */
    public function findCountArticle() {
        
        return self::count();
    }

    /**                 根据用户 ID 查询文章 ID
     * @param $UserID
     * @return mixed    返回用户 ID 的文章 ID
     */
    public function selectUserArticleID ($UserID) {
        return self::select('id')
            ->where('author' , $UserID)
            ->get()
            ->toArray();
    }

    /**                 根据偏移量，查询文章列表
     * @param $offset
     * @return mixed    返回查询的文章
     */
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

    /**                 根据栏目 ID ，查询文章
     * @param $CatId    栏目 ID
     * @return mixed 返回查询结果
     */
    public function selectCatArticle($CatArr) {

        return self::join('users' , 'articles.author' , '=' , 'users.id')
            ->join('categories' , 'articles.cat_id' , '=' , 'categories.id')
            ->join('articles_status' , 'articles.article_status' , '=' , 'articles_status.id')
            ->select('articles.id' , 'articles.title' ,'categories.cat_name' , 'articles.thumb' , 'articles.content' , 'articles.seo_title' , 'articles.seo_keyword' , 'articles.seo_description' , 'users.name as author' , 'articles.updated_at')
            ->whereIn('cat_id' , $CatArr)
            ->orderBy('id','desc')
            ->paginate(10);
    }

    public function selectCatArtCount($CatArr) {
        return self::whereIn('cat_id',$CatArr)
            ->count();
    }

    public function findArtCat($ArtID) {
        $arr = self::select('cat_id')
            ->find($ArtID)
            ->toArray();
        return $arr['cat_id'];
    }

    /**             分页查询文章列表
     * @return mixed 返回分页结果
     */
    public function selectArt() {
        return self::join('users' , 'articles.author' , '=' , 'users.id')
            ->join('categories' , 'articles.cat_id' , '=' , 'categories.id')
            ->join('articles_status' , 'articles.article_status' , '=' , 'articles_status.id')
            ->select('articles.id' , 'articles.title' ,'categories.cat_name' , 'articles.article_status' ,'articles_status.article_status_name' , 'users.name as author' , 'articles.updated_at')
            ->paginate(10);
    }

    /**             根据文章 ID 查询文章详细信息
     * @param $artId
     * @return mixed 返回查询的栏目信息
     */
    public function findArt($artId) {
        
        return self::find($artId);
    }

    /**             根据文章 ID 查询文章详细信息
     * @param $ArtID
     * @return mixed 返回查询文章信息
     */
    public function findArtInfo($ArtID) {

        return self::join('users' , 'articles.author' , '=' , 'users.id')
            ->join('categories' , 'articles.cat_id' , '=' , 'categories.id')
            ->select('articles.id','title','cat_name','articles.thumb','users.pen_name as author','users.thumb as user_thumb','users.github','users.content as author_description','articles.content','articles.seo_title','articles.seo_keyword','articles.seo_description','articles.updated_at')
            ->find($ArtID);
    }

    /**             查询垃圾箱分页信息
     * @return mixed 返回分页查询的垃圾箱信息
     */
    public function selectDustbin() {
        return self::onlyTrashed()
            ->join('users' , 'articles.author' , '=' , 'users.id')
            ->join('categories' , 'articles.cat_id' , '=' , 'categories.id')
            ->select('articles.id' , 'articles.title' ,'categories.cat_name' , 'users.name as author' , 'articles.deleted_at')
            ->paginate(10);
    }

    /**             插入文章信息，并返回文章实例
     * @return static 返回保存结果
     */
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

    /**                 文章表单验证
     * @param int $ArtID 当文章更新时，需要验证的文章 ID
     */
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

    /**             验证文章是否存在
     * @param $ArtID 需要验证的文章 ID
     * @return bool 返回是否存在
     */
    public function validatorArtExists($ArtID) {
        $artInfo = self::where('id' , $ArtID) -> count();
        if (!empty($artInfo)) {
            return true;
        }
    }

    /**             验证垃圾箱中是否存在此文章
     * @param $ArtID 需要验证的文章 ID
     * @return bool 返回是否存在
     */
    public function validatorDustbinExists($ArtID) {

        $artInfo = self::onlyTrashed() -> where('id' , $ArtID) -> count();

        if (!empty($artInfo)) {
            return true;
        }
    }

}
