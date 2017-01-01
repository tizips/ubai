<?php

namespace App\Model;

use Request;
use Validator;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $guarded = [];

    public function addComment($VipID) {
        $input = Request::only('content','comment','comment_post_id','comment_parent');
        $input['name'] = $VipID;
        $input['comment_status'] = 1;
        return self::create($input);
    }

    public function selectParentComment($ArtID) {
        return self::join('vips' , 'comments.name' , '=' , 'vips.id')
            ->select('comments.id as comment_id','vips.user_name as comment_user_name','vips.user_url as comment_user_url','vips.thumb as comment_user_thumb','comments.content as comment_content','comments.created_at')
            ->where('comment_parent',0)
            ->where('comment_post_id',$ArtID)
//            ->get()
            ->paginate(10);
    }

    public function ValidatorComment($CommentArr) {
        $validator = Validator::make($CommentArr , [
            'content'       =>      'required|max:500',
            'comment_post_id'   =>  'required|integer|exists:articles,id',
//            'comment_parent'    =>  'sometimes|integer|exists:comments,id'
        ] , [
            'content.required'  =>  '评论内容不能为空',
            'content.max'       =>  '评论内容不能超过 500 个字符',
            'comment_post_id.required'      =>      '评论文章不能为空',
            'comment_post_id.integer'       =>      '所评论文章 ID 格式错误',
            'comment_post_id.exists'        =>      '所评论文章不存在',
            'comment_parent.integer'        =>      '回复对象 ID 格式错误',
            'comment_parent.exists'         =>      '回复对象不存在'
        ]);
        $validator->sometimes('comment_parent','integer|exists:comments,id',function ($input) {
            return $input->comment_parent != 0;
        });
        if ($validator->fails()) {
//            return [
//                'error'     =>      $validator->errors()->first()
//            ];
            return response($validator->errors()->first(),403);
        }
    }
}
