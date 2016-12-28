<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'Home\IndexController@index');
Route::get('link' ,'Home\LinkController@index');
Route::get('Art/{ArtID}' ,'Home\ArticleController@index');
Route::get('Cat/{CatID}', 'Home\CategoryController@index');
Route::get('msg', 'Home\MsgController@index');
Route::post('toAjaxComment' , 'Home\CommentController@toAddComment');

Auth::routes();

Route::get('logout' , function () {
    \Illuminate\Support\Facades\Auth::logout();
    return \Illuminate\Support\Facades\Redirect::to('/login');
})->middleware('auth');

Route::group(['prefix' => 'admin' , 'middleware' => 'auth'] , function () {
    Route::get('profile' , 'Admin\ProfileController@index');
    Route::post('profile/uploadThumb' , 'Admin\ProfileController@uploadThumb');
    Route::post('toUpdateProfile' , 'Admin\ProfileController@toUpdateProfile');
    Route::get('editPwd' , 'Admin\ProfileController@editPwd');
    Route::get('/' , 'Admin\SystemController@index');
    Route::get('addArt' , 'Admin\ArticleController@addArticle');
    Route::get('art' , 'Admin\ArticleController@article');
    Route::get('editArt/{artId}' , 'Admin\ArticleController@editArt');
    Route::get('dustbin' , 'Admin\ArticleController@dustbin');
    Route::get('toDustbin/{ArtID}' , 'Admin\ArticleController@toDustbin');
    Route::get('toDelArt/{ArtID}' , 'Admin\ArticleController@toDelete');
    Route::get('toDelDustbin/{ArtID}' , 'Admin\ArticleController@toDelDustbin');
    Route::post('toAddArt' , 'Admin\ArticleController@toAddArt');
    Route::post('toUpdateArt' , 'Admin\ArticleController@toUpdateArt');
    Route::get('toRestoreArt/{ArtID}' , 'Admin\ArticleController@toRestoreArt');
    Route::post('uploadPic' , 'Admin\ArticleController@uploadBanner');
    Route::post('uploadArticlePic' , 'Admin\ArticleController@uploadPic');
    Route::get('cat' , 'Admin\CatController@category');
    Route::get('addCat/{catPid?}' , 'Admin\CatController@addCat');
    Route::get('editCat/{catId}', 'Admin\CatController@editCat');
    Route::post('toAddCat' , 'Admin\CatController@toAddCat');
    Route::post('toEditCat' , 'Admin\CatController@toEditCat');
    Route::get('editCatStatus' , 'Admin\CatController@editStatus');
    Route::get('toDelCat/{catId}' , 'Admin\CatController@toDelCat');
    Route::get('file' , 'Admin\FileController@index');
    Route::get('comment' , 'Admin\CommentController@index');
    Route::get('msg' , 'Admin\MsgController@index');
    Route::get('link' , 'Admin\LinkController@index');
    Route::get('addLink' , 'Admin\LinkController@addLink');
    Route::post('toAddLink' , 'Admin\LinkController@toAddLink');
    Route::get('editLink/{linkId}' , 'Admin\LinkController@editLink');
    Route::post('toEditLink' , 'Admin\LinkController@toEditLink');
    Route::get('delLink/{LinkID}' , 'Admin\LinkController@delLink');
    Route::post('link/uploadThumb' , 'Admin\LinkController@uploadThumb');
    Route::get('setting' , 'Admin\SetController@index');
});

Route::get('test' , function () {
    $cat = new \App\Model\Category();
    $page = new \App\Tool\UpdateCache();
    $art = new \App\Model\Article();
    // 根据文章 ID ，查出文章所有栏目 ID
//    $CatArr = $cat -> selectArtCat(11);
//    dd($CatArr);
    //  遍历查询出所有栏目的子栏目
//    if (!empty($CatArr)) {
//        foreach ($CatArr as $value) {
            $arr = $cat -> simpleFind(10);
            $arrInfo = array();
            if (!empty($arr)) {
                foreach ($arr as $val) {
                    $arrInfo[] = $val['id'];
                }
            }
            $arrInfo[] = 10;
//            $CatInfo[] = $value;
//            $artNum = $art -> selectCatArtCount($arrInfo);
//            $pageNum = ceil($artNum / 10);
//            dd($CatInfo);
//            for ($i = 0; $i < $pageNum; $i++) {
//                $list = $art -> selectCatArticle($i, $arrInfo);
//                Cache::store('file')->forever('category_'.$value.'_'.($i+1),$list);
//                Cache::store('file')->forever('page_'.$value.'_'.($i+1) , $page -> artPage($i+1,$pageNum,'/'));
//            }
//        }
//    }
});
Route::get('demo',function (){
//    dd(\Illuminate\Support\Facades\Cache::store('file')->forget('category_11_1'));
    return 'https://gravatar.css.network/avatar/'.md5('tizips@qq.com').'.jpg?s=32';
});