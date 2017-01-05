<?php
    namespace App\Tool;

    class CommentDealt {

        static function showChildComment($child) {
            echo '<ul class="children">';
            foreach ($child as $value) {
                echo '
                    <li class="comment byuser comment-author-yxs bypostauthor odd alt depth-2" id="comment-'.$value['comment_id'].'">
                        <div id="div-comment-'.$value['comment_id'].'" class="comment-body">
                            <div class="comment-author vcard">
                                <img alt=\'\' src=\''.$value['comment_user_thumb'].'\' class=\'avatar avatar-32 photo\' height=\'32\' width=\'32\' />
                                <cite class="fn">'.$value['comment_user_name'].'</cite><span class="says">说道：</span>
                            </div>

                            <div class="comment-meta commentmetadata">
                                <a href="'.url()->previous().'#comment-'.$value['comment_id'].'">
                                    '.$value['created_at'].'
                                </a>
                            </div>

                            <p>@<a href="#comment-'.$value['comment_parent'].'">'.$value['parent_name'].'</a>
                            <p>'.$value['comment_content'].'</p>

                            <div class="reply">
                                <a rel=\'nofollow\' class=\'comment-reply-link\' href=\''.url()->previous().'?replytocom='.$value['comment_id'].'#respond\' onclick=\'return addComment.moveForm( "div-comment-'.$value['comment_id'].'", "'.$value['comment_id'].'", "respond", "52" )\' aria-label=\'回复给'.$value['comment_user_name'].'\'>回复</a>
                            </div>
                        </div>
                    </li><!-- #comment-## -->
                ';
                if (isset($value['child'])) {
                    self::showChildComment($value['child']);
                }
            }
            echo '</ul>';
        }
    }