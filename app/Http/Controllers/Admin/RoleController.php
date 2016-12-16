<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Role;
use App\Model\Permission;
use App\Model\User;
use Request;

class RoleController extends Controller
{
    public function addRole() {

        $createPost = Permission::where('id' , '=' , '1') -> first();
        $owner = Role::where('name' , '=' , 'owner') -> first();
        $owner->attachPermissions([1,2,3,4]);
    }

    public function addPermission() {

        $manageArticle = new Permission();
        $manageArticle->name = 'manage.article';
        $manageArticle->display_name = '管理文章';
        $manageArticle->description = '';
        $manageArticle->save();

        $createArticle = new Permission();
        $createArticle->name = 'create.article';
        $createArticle->display_name = '创建文章';
        $createArticle->description = '';
        $createArticle->save();

        $editArticle = new Permission();
        $editArticle->name = 'edit.article';
        $editArticle->display_name = '编辑文章';
        $editArticle->description = '';
        $editArticle->save();


        $deleteArticle = new Permission();
        $deleteArticle->name = 'delete.article';
        $deleteArticle->display_name = '删除文章';
        $deleteArticle->description = '';
        $deleteArticle->save();

        $manageCategory = new Permission();
        $manageCategory->name = 'manage.category';
        $manageCategory->display_name = '管理栏目';
        $manageCategory->description = '';
        $manageCategory->save();

        $createCategory = new Permission();
        $createCategory->name = 'create.category';
        $createCategory->display_name = '创建栏目';
        $createCategory->description = '';
        $createCategory->save();

        $editCategory = new Permission();
        $editCategory->name = 'edit.category';
        $editCategory->display_name = '编辑栏目';
        $editCategory->description = '';
        $editCategory->save();

        $deleteCategory = new Permission();
        $deleteCategory->name = 'delete.category';
        $deleteCategory->display_name = '删除栏目';
        $deleteCategory->description = '';
        $deleteCategory->save();

        $manageLink = new Permission();
        $manageLink->name = 'manage.link';
        $manageLink->display_name = '管理友情链接';
        $manageLink->description = '';
        $manageLink->save();

        $createLink = new Permission();
        $createLink->name = 'create.link';
        $createLink->display_name = '创建友情链接';
        $createLink->description = '';
        $createLink->save();

        $editLink = new Permission();
        $editLink->name = 'edit.link';
        $editLink->display_name = '编辑友情链接';
        $editLink->description = '';
        $editLink->save();

        $deleteLink = new Permission();
        $deleteLink->name = 'delete.link';
        $deleteLink->display_name = '删除友情链接';
        $deleteLink->description = '';
        $deleteLink->save();
    }
}
