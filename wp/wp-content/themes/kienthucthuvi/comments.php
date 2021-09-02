<?php
function kttv_show_comment($comment, $args, $depth)
{
    global $count;
    $count++;
    if ($comment->comment_approved == '1') :
?>
        <li <?php comment_class('comment-list__item count-' . $count) ?> id="comment-<?php comment_ID(); ?>">
            <div class="comment-list__flex">
                <div class="comment-list__avatar"><?php echo get_avatar($comment, 82); ?></div>
                <div class="comment-list__content">
                    <div lass="comment-list__flex">
                        <div class="comment-list__name"><?php comment_author($comment); ?></div>
                        <div class="comment-list__comment"><?php echo nl2br(get_comment_text($comment)); ?></div>
                    </div>
                    <div class="comment-list__flex">
                        <div class="comment-list__date"><?php comment_date('M d Y', $comment); ?> </div>
                        <div class="comment-list__reply">
                            <?php
                            comment_reply_link(
                                array_merge(
                                    $args,
                                    array('depth' => $depth, 'max_depth' => $args['max_depth'])
                                )
                            );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </li>
<?php
    endif;
}
?>
<div class="comment-list">
    <div class="comment-list__title-wrapper">
        <h4 class="comment-list__title">
            <?php
            comments_number(
                'Không có bình luận',
                '1 bình luận',
                '% bình luận'
            )
            ?>
        </h4>
    </div>
    <ul class="comment-list__list">
        <?php wp_list_comments(array('callback' => 'kttv_show_comment')); ?>
    </ul>
    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
        <div class="clear"></div>
        <!-- start: #comment-nav -->
        <nav id="comment-nav">
            <div class="nav-previous float-left">
                <?php previous_comments_link(__('<< Previous', 'gola')); ?>
            </div>
            <div class="nav-next float-right">
                <?php next_comments_link(__('Next >>', 'gola')); ?>
            </div>
        </nav>
        <!-- end: #comment-nav -->
    <?php endif; ?>

    <?php
    if (!comments_open()) :
    ?>
        <h4>
            Chúng tôi xin lỗi, comment đã đóng.
        </h4>
    <?php
    endif;
    ?>
</div>
<div class="comment">
    <?php
    comment_form(array(
        'comment_field' => '<textarea class="comment__field" name="comment" rows="3" placeholder="Viết bình luận của bạn ..."></textarea>',
        'fields'        => array(
            'author'    => '<div class="comment__flex">
                                <input type="text" class="comment__name" name="author" placeholder="Tên*" />',
            'email'     =>      '<input type="text" class="comment__email" name="email" placeholder="Email*" />
                            </div>',
            'url'       =>  '<input type="text" class="comment__website" name="website" placeholder="Website" />'
        ),
        'class_form'    => 'custom-input mt-30',
        'submit_button' => '<button class="comment__button" type="submit" name="submit">Bình luận</button>',
        'title_reply_before' => '<div class="comment__title">',
        'title_reply'   => 'Viết bình luận',
        'title_reply_after' =>      '</div>',
        'comment_notes_before' => 'Địa chỉ email của bạn sẽ không được công khai. Các trường bắt buộc được đánh dấu *',
    ));
    ?>
</div>