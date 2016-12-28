<?php

namespace App\Model;

use Validator;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function addComment() {

    }
    public function ValidatorComment($CommentArr) {
        $validator = Validator::make($CommentArr , [
            'content'       =>      'required|max:500',
            'comment_post_id'   =>  'required|integer|exists:articles,id',
            'comment_parent'    =>  'sometimes|integer|exists:comments,id'
        ] , [
            'content.required'  =>  '评论内容不能为空',
            'content.max'       =>  '评论内容不能超过 500 个字符',
            'comment_post_id.required'      =>      '评论文章不能为空',
            'comment_post_id.integer'       =>      '所评论文章 ID 格式错误',
            'comment_post_id.exists'        =>      '所评论文章不存在',
            'comment_parent.integer'        =>      '回复对象 ID 格式错误',
            'comment_parent.exists'         =>      '回复对象不存在'
        ]);
        if ($validator->fails()) {
//            return [
//                'error'     =>      $validator->errors()->first()
//            ];
            return response($validator->errors()->first(),403);
        }
    }
}
