<?php

namespace App\Model;

use Request;
use Validator;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $guarded = [];

    public function addComment($VipID) {
        $input = Request::only('content','comment','comment_post_id','comment_cat_id','comment_parent');
        $input['name'] = $VipID;
        $input['comment_status'] = 1;
        return self::create($input);
    }

    public function findVipID($parent_id) {
        $info = self::join('vips','comments.name','=','vips.id')
            ->select('vips.user_name as comment_parent_user_name')
            ->find($parent_id);
        return $info->comment_parent_user_name;
    }
    public function selectParentComment($ArtID) {
        return self::join('vips' , 'comments.name' , '=' , 'vips.id')
            ->select('comments.id as comment_id','vips.user_name as comment_user_name','vips.user_url as comment_user_url','vips.thumb as comment_user_thumb','comments.content as comment_content','comments.created_at')
            ->where('comment_parent',0)
            ->where('comment_post_id',$ArtID)
//            ->get()
            ->paginate(10);
    }

    public function countChildComment($ArtID) {
        return self::where('comment_post_id',$ArtID)->count();
    }

    public function countCategoryChildComment($CatID) {
        return self::where('comment_cat_id',$CatID)->count();
    }

    public function selectChildComment($ArtID) {
//        dd($this->findVipID(6,2));
        $childComment = self::join('vips' , 'comments.name' , '=' , 'vips.id')
            ->select('comments.id as comment_id','vips.user_name as comment_user_name','vips.user_url as comment_user_url','vips.thumb as comment_user_thumb','comments.content as comment_content','comments.comment_parent','comments.created_at')
            ->orderBy('comments.id','desc')
//            ->where('comment_parent',0)
            ->where('comment_post_id','=',$ArtID)
            ->get()
            ->toArray();
//        dd($childComment);
        foreach ($childComment as $key => $value) {
            if ($value['comment_parent']!=0) {
                $childComment[$key]['parent_name'] = $this->findVipID($value['comment_parent']);
            }
        }
//        dd($childComment);
        return $this->orderChildComment($childComment);
//        dd($this->orderChildComment($parent_id,$childComment));
    }

    public function selectCategoryChildComment($CatID) {

        $childComment = self::join('vips' , 'comments.name' , '=' , 'vips.id')
            ->select('comments.id as comment_id','vips.user_name as comment_user_name','vips.user_url as comment_user_url','vips.thumb as comment_user_thumb','comments.content as comment_content','comments.comment_parent','comments.created_at')
            ->orderBy('comments.id','desc')
//            ->where('comment_parent',0)
            ->where('comment_cat_id','=',$CatID)
            ->get()
            ->toArray();
//        dd($childComment);
        foreach ($childComment as $key => $value) {
            if ($value['comment_parent']!=0) {
                $childComment[$key]['parent_name'] = $this->findVipID($value['comment_parent']);
            }
        }

        return $this->orderChildComment($childComment);
    }

    public function orderChildComment($commentArr) {
        $comArr = array();
        foreach ($commentArr as $value) {

            $comArr[$value['comment_id']] = $value;
        }
        foreach ($comArr as $value) {

            foreach ($comArr as $val) {
                if ($value['comment_id'] == $val['comment_parent']) {

                    $comArr[$val['comment_parent']]['child'][] = $val;
                }
            }
        }
//        return $comArr;
        $comment = array();
        foreach ($comArr as $value) {
            if ($value['comment_parent'] == 0) {
                $comment[$value['comment_id']] = $value;
            }
        }
        $comment = array_sort_recursive($comment);

        return $comment;
    }

    public function ValidatorComment($CommentArr) {
        $validator = Validator::make($CommentArr , [
            'content'       =>      'required|max:500',
//            'comment_post_id'   =>  'required|integer|exists:articles,id',
//            'comment_parent'    =>  'sometimes|integer|exists:comments,id'
        ] , [
            'content.required'  =>  '评论内容不能为空',
            'content.max'       =>  '评论内容不能超过 500 个字符',
            'comment_post_id.required'      =>      '评论文章不能为空',
            'comment_post_id.integer'       =>      '所评论文章 ID 格式错误',
            'comment_post_id.exists'        =>      '所评论文章不存在',
            'comment_cat_id.required'       =>      '评论栏目不能为空',
            'comment_cat_id.integer'        =>      '所评论栏目 ID 格式错误',
            'comment_cat_id.exists'         =>      '所评论栏目不存在',
            'comment_parent.integer'        =>      '回复对象 ID 格式错误',
            'comment_parent.exists'         =>      '回复对象不存在'
        ]);
        $validator->sometimes('comment_parent','integer|exists:comments,id',function ($input) {
            return $input->comment_parent != 0;
        });
        $validator->sometimes('comment_post_id','required|integer|exists:articles,id',function ($input) {
            return $input->comment_post_id != 0;
        });
        $validator->sometimes('comment_cat_id','required|integer|exists:categories,id',function ($input) {
            return $input->comment_cat_id != 0;
        });
        if ($validator->fails()) {
//            return [
//                'error'     =>      $validator->errors()->first()
//            ];
            return response($validator->errors()->first(),403);
        }
    }
}
