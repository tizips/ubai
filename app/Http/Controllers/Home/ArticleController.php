<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\Article;
use App\Model\Comment;
use Illuminate\Support\Facades\Cache;
use Request;

class ArticleController extends Controller
{
    public function index($ArtId) {
        $article = new Article();
//        dd($article->findArtInfo(2));
//        dd(Cache::store('file')->get('article_'.$ArtId));
//        dd();
        $comment = new Comment();
        $commentResult = $comment->selectChildComment($ArtId);
//        dd($commentResult);
        $commentNum = $comment->countChildComment($ArtId);
//        dd($commentResult->);
//        foreach ($commentResult as $key => $value) {
//            echo $value->comment_id."<br />";
//            $value->prepend($comment->selectChildComment($value->comment_id,2),'child');
//            $value->child = $comment->selectChildComment($value->comment_id,2);
//        }
//        dd($comment->selectChildComment(6,2));
//        dd($comment->selectParentComment($ArtId));
        return view('home.article')
            ->with('menu' , Cache::get('topMenu'))
            ->with('art' , $article->findArtInfo($ArtId))
            ->with('link' , Cache::get('link'))
            ->with('commentNum',$commentNum)
            ->with('comment',$commentResult);
    }
}
