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

Route::get('/', function () {
    return view('welcome');
});

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
    Route::get('comment' , 'Admin\CommentController@index');
    Route::get('msg' , 'Admin\MsgController@index');
    Route::get('link' , 'Admin\LinkController@index');
    Route::get('addLink' , 'Admin\LinkController@addLink');
    Route::post('toAddLink' , 'Admin\LinkController@toAddLink');
    Route::get('editLink/{linkId}' , 'Admin\LinkController@editLink');
    Route::post('toEditLink' , 'Admin\LinkController@toEditLink');
    Route::get('delLink' , 'Admin\LinkController@delLink');
    Route::get('setting' , 'Admin\SetController@index');
});

Route::get('/home', 'HomeController@index');
