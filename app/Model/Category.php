<?php

namespace App\Model;

use App\Api\Api;
use Validator;
use Illuminate\Database\Eloquent\Model;
use Request;

class Category extends Model
{

    protected $guarded = [];

//    public $dateFormat = "U";
    
    public function addCat() {

        $catInfo = Request::only('cat_name','cat_order','cat_pic','cat_pid','cat_seo_title','cat_seo_keyword','cat_seo_description','cat_url','cat_page_content');

        $catInfo['cat_order'] = Request::has('cat_order') ? Request::get('cat_order') : 50;
        $catInfo['cat_status'] = Request::has('cat_status') ? 1 : 0;
        $catInfo['cat_page'] = Request::has('cat_page') ? 1 : 0;

        return self::create($catInfo);
    }

    /** 修改栏目信息
     * @return mixed 返回修改结果
     */
    public function editCat() {

        $catInfo = Request::only('id','cat_pid','cat_name','cat_pic','cat_url','cat_order','cat_status','cat_seo_title','cat_seo_keyword','cat_seo_description','cat_page','cat_page_content');
        $catInfo['cat_order'] = $catInfo['cat_order'] ? $catInfo['cat_order'] : 50;
        $catInfo['cat_status'] = $catInfo['cat_status'] ? $catInfo['cat_status'] : 0;
        $catInfo['cat_page'] = $catInfo['cat_page'] ? $catInfo['cat_page'] : 0;

        $category = self::select('cat_name' , 'cat_order' , 'cat_pid' , 'cat_seo_title' , 'cat_seo_keyword' , 'cat_seo_description' , 'cat_url' , 'cat_status' , 'cat_page' , 'cat_page_content')
                    -> find($catInfo['id']);
        foreach ($catInfo as $key => $value) {
            $category -> $key = $value;
        }
        return $category -> save();
    }

    public function delCat($CatID) {

        $catInfo = $this -> delFind($CatID);
        $arr[] = $CatID;
        if (!empty($catInfo)) {
            foreach ($catInfo as $value) {
                $arr[] = $value['id'];
            }
        }
//        dd(self::destroy(8));
        if (!empty(self::destroy($arr))) {
            return true;
        }
    }

    public function delFind($catId) {

        $catInfo = self::select('id','cat_pid' , 'cat_name')
            ->get()
            ->toArray();
        return $this -> orderCat($catInfo , $catId);
    }

    public function selectArtCat($CatID) {
        $CatArr = self::join('categories_status' , 'categories.cat_status' , '=' , 'categories_status.id')
                ->select('categories.id','categories.cat_pid')
                ->get()
                ->toArray();
//        $CatArr = array_except($this->orderCatPage($CatID ,$CatArr) , 0);
        $CatArr = $this->orderCatPage($CatID ,$CatArr);
        foreach ($CatArr as $key => $value) {
            if ($value==0) {
                unset($CatArr[$key]);
            }
        }
        return $CatArr;
    }

    /** 通过栏目 ID 查询栏目信息
     * @param $catId 需要查询的栏目 ID
     * @return mixed 栏目信息
     */
    public function findCat($catId) {
//        $validateResult = $this -> validatorCatExists($catId);
//        if (!empty($validateResult)) {
//            return $validateResult;
//        }
        $catInfo = self::select("*")
                -> where('id' , '=' , $catId)
                -> first();
        return $catInfo;
    }
    /**              简略查询、处理栏目信息并返回栏目信息
     * @return array 栏目信息数组
     */
    public function simpleFind($CatID = 0) {
        $catInfo = self::join('categories_status' , 'categories.cat_status' , '=' , 'categories_status.id')
            ->select('categories.id as id','cat_name','cat_order','cat_pid','cat_url','cat_status' ,'cat_page' , 'categories_status.id as cat_status' , 'cat_status_name')
            ->orderBy('cat_order' , 'desc')
            ->orderBy('id','asc')
            ->get()
            ->toArray();
        return $this -> orderCat($catInfo , $CatID);
    }


    public function selectMenu() {
        $catInfo = self::select('id','cat_name','cat_pid','cat_seo_title','cat_seo_keyword','cat_seo_description','cat_url')
            ->where('cat_status' , '=' , 0)
            ->orderBy('cat_order' , 'asc')
            ->orderBy('id','desc')
            ->get()
            ->toArray();
//        dd($catInfo);
        return $this -> orderCatMenu($catInfo);
    }

    /**编辑栏目状态 ： 隐藏 / 显示
     * @return mixed 返回编辑栏目成功/失败结果
     */
    public function editStatus() {
        $id = Request::get('id');

        $validateResult = $this -> validatorCatExists($id);
        if (!empty($validateResult)) {
            return $validateResult;
        }

        $catInfo = self::select('id','cat_status')
            ->  where('id' , '=' , $id)
            -> first();
        if ($catInfo -> cat_status == 0) $catInfo -> cat_status = 1;
        else $catInfo -> cat_status = 0;
        return $catInfo -> save();
    }

    /**        添加栏目自动验证
     * @return mixed 验证通过不返回任何元素，验证不通过，通过 Api 返回状态码及消息提示
     */
    public function editCatValidator($CatID = 0) {

        $validator = Validator::make(Request::except('_token') , [
            'cat_name'      =>  'bail|required|unique:categories,cat_name,'.$CatID,
            'cat_url'       =>  'sometimes|url'
        ] , [
            'cat_name.required'     =>  '栏目名称不能为空',
            'cat_name.unique'       =>  '栏目已存在',
            'cat_url.url'    =>  '链接格式不正确',
            'cat_pid.exists'        =>  '父级栏目不存在'
        ]);
        $validator -> sometimes('cat_pid' , 'exists:categories,id' , function ($input) {
            return $input -> cat_pid != 0;
        });
        $validator -> validate();
    }

    /**验证 Id ， 判断栏目是否存在
     * @return mixed 返回验证结果
     */
    public function validatorCatExists ($CatId) {
//        $CatApi = new Api();
//        dd(self::where('id','=',$CatId)->count());
//        $validateResult = self::find($catId);
        if (!empty(self::where('id','=',$CatId)->count())) {
            return true;
        }
    }

    /**       递归无限极处理栏目
     * @param $catInfo 原栏目数组
     * @param int $pid 栏目父级 id
     * @param int $level 栏目缩进量
     * @return array 返回处理过后的栏目数组
     */
    public function orderCat($catInfo , $pid = 0 , $level = 0) {
        static $catArr = array();
        static $icon = "┣━━━";
        foreach ($catInfo as $value) {
            if ($value['cat_pid'] == $pid) {
                $value['level'] = $level + 1;
                $value['cat_title'] = str_repeat($icon , $value['level']).$value['cat_name'];
                $catArr[] = $value;
                $this->orderCat($catInfo , $value['id'] , $level + 1);
            }
        }
        return $catArr;
    }

    public function orderCatMenu($catInfo) {

        $catArr = array();
        foreach ($catInfo as $value) {

            $catArr[$value['id']] = $value;
        }
        foreach ($catArr as $value) {

            foreach ($catArr as $val) {
                if ($value['id'] == $val['cat_pid']) {

                    $catArr[$val['cat_pid']]['child'][] = $val;
                }
            }
        }
        $category = array();
        foreach ($catArr as $value) {
            if ($value['cat_pid'] == 0) {
                $category[$value['id']] = $value;
            }
        }
        $category = array_sort_recursive($category);
        
        return $category;
    }
    public function orderCatPage($CatID , $CatArr) {
        static $catInfo = array();
        foreach ($CatArr as $value) {
            $catInfo[$value['id']] = $value;
        }
        static $arr = array();
        foreach ($catInfo as $key => $value) {
            if ($value['id']==$CatID) {
                $arr[] = $value['cat_pid'];
                $this->orderCatPage($value['cat_pid'] , $catInfo);
            }
        }
        return $arr;
    }
}
