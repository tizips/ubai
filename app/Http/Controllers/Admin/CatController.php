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
    public function category()
    {
        $category = new Category();
        $catInfo = $category->simpleFind();
        $title = '栏目管理';
        return view('admin.category', compact('title'))
            ->with('catInfo', $catInfo);
    }

    public function addCat($catPid = 0)
    {

        $category = new Category();
        if ($catPid != 0 && !$category->validatorCatExists($catPid)) {
            abort('404');
        }
        $title = '添加栏目';
        return view('admin.addCat', compact('title'))
            ->with('catInfo', $category->simpleFind())
            ->with('catPid', $catPid);
    }

    public function editCat($catId)
    {

        $category = new Category();

        if (!$category->validatorCatExists($catId)) {
            abort(404);
        }
        $title = '编辑栏目';
        return view('admin.editCat', compact('title'))
            ->with('catInfo', $category->simpleFind())
            ->with('cat', $category->findCat($catId));
    }

    public function toDelCat($catId)
    {

        $category = new Category();

        if (!$category->validatorCatExists($catId)) {
            abort('404');
        }
        if (empty($category->delCat($catId))) {
            return 'error';
        }
        $this->store();
        return redirect('admin/cat');
    }

    public function toAddCat()
    {

        $category = new Category();

        $category->editCatValidator();

        if (!$category->addCat()) {
            return 'error';
        }
        $this->store();
        return redirect('admin/cat');

    }

    public function toEditCat()
    {

        $category = new Category();

        if (!$category->validatorCatExists(Request::get('id'))) {
            abort('404');
        }
        $category->editCatValidator(Request::get('id'));
        if (!$category->editCat()) {
            return 'error';
        }
        $this->store();
        return redirect('admin/cat');
    }

    public function editStatus()
    {
        $CatApi = new Api();
        $category = new Category();
        if (!$category->editStatus()) {
            $CatApi->Message = "修改失败";
        } else {
            $this->store();
            $CatApi->Status = 1;
            $CatApi->Message = "修改成功";
            $CatApi->Data = $category->simpleFind();
        }
        return $CatApi->AjaxReturn();
    }

    public function store()
    {

        dispatch(new UpdateMenuCache());
    }
}