<?php

namespace App\Http\Controllers\Admin;

use App\Api\Api;
use App\Http\Controllers\Controller;
use App\Jobs\UpdateMenuCache;
use App\Model\Category;
use Session;
use Request;

class CatController extends Controller
{
    public function category () {
        $category = new Category();
        $catInfo = $category -> simpleFind();
        $title = '栏目管理';
        return view('admin.category' , compact('title'))
            -> with('catInfo' , $catInfo);
    }
    public function addCat ($catPid = 0) {

        $category = new Category();
        if ($catPid != 0 && !$category -> validatorCatExists($catPid)) {
            abort('404');
        }
        $title = '添加栏目';
        return view('admin.addCat' , compact('title'))
            -> with('catInfo' , $category -> simpleFind())
            -> with('catPid' , $catPid);
    }
    public function editCat ($catId) {
        $category = new Category();
//        $validateResult = $category -> validatorCatExists($catId);
//        dd($category -> validatorCatExists($catId));
        if (!$category -> validatorCatExists($catId)) {
//            return $validateResult;
            abort(404);
        }

        $title = '编辑栏目';
        return view('admin.editCat' , compact('title'))
            -> with('catInfo' , $category -> simpleFind($catId))
            -> with('cat' , $category -> findCat($catId));
    }
    public function toDelCat($catId) {
        $CatApi = new Api();
        $category = new Category();

        if (!$category -> validatorCatExists($catId)) {
            abort('404');
        }
        if (empty($category -> delCat($catId))) {
            return 'error';
        }else{
            return redirect('admin/cat');
        }
//        return $CatApi -> AjaxReturn();
    }
    public function toAddCat() {
        $category = new Category();
        $result = $category -> editCatValidator();
        if (!empty($result)) {
            return $result;
        }
//        dd($category -> addCat());
        if (!$category -> addCat()) {
//            $CatApi -> Message = "添加失败 ！";
            return 'error';
        }else{
//            $this -> store();
            return redirect('admin/cat');
//            $CatApi -> Status = 1;
//            $CatApi ->  Message = "添加成功";
        }
//        return $CatApi -> AjaxReturn();
    }
    public function toEditCat() {
//        $CatApi = new Api();
        $category = new Category();
//        $this -> validatorCatExists(Request::get('id'));
        if (!$category -> validatorCatExists(Request::get('id'))) {
            abort('404');
        }
        $category -> editCatValidator(Request::get('id'));
        if (!$category -> editCat()) {
//            $CatApi -> Message = '修改失败';
            return 'error';
        }else{
            return redirect('admin/cat');
//            $this -> store();
//            $CatApi -> Status = 1;
//            $CatApi -> Message = '修改成功';
        }
//        return $CatApi -> AjaxReturn();
    }
    public function editStatus() {
        $CatApi = new Api();
        $category = new Category();
        if (!$category -> editStatus()) {
            $CatApi -> Message = "修改失败";
        }else{
            $this -> store();
            $CatApi -> Status = 1;
            $CatApi -> Message = "修改成功";
            $CatApi -> Data = $category -> simpleFind();
        }
        return $CatApi -> AjaxReturn();
    }

    public function store() {

        dispatch(new UpdateMenuCache());
    }

//    public function validatorAddCategory(Request $request) {
//        $this->validate($request , [
//            'cat_name'      =>  'bail|required|unique:categories,cat_name',
//            'cat_pid'       =>  'required',
//            'cat_url'       =>  'active_url',
//        ] , [
//            'cat_name.required'     =>  '栏目名称不能为空',
//            'cat_name.unique'       =>  '栏目名称已存在',
//            'cat_pid.required'      =>  '父级栏目ID不能为空',
//            'cat_url.active_url'    =>  '链接格式不正确',
//        ]);
//    }
}
