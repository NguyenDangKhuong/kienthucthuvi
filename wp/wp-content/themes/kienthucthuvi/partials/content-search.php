<li class="post__item">
    <div class="post__flex">
        <a class="post__link" href="<?php the_permalink(); ?>">
            <div class="post__image" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>')"></div>
            <div class="post__info">
                <div class="post__wrapper">
                    <div class="post__author"><?php the_author(); ?></div>
                    <div class="post__date">&nbsp;-&nbsp;<span><?php the_date('d/m/Y'); ?></span></div>
                    <div class="post__comment">
                        &nbsp;-&nbsp;
                        <span class="post__comment-wrapper">
                            <div class="post__comment-icon"></div>
                            <?php echo get_comments_number(get_the_ID()) ?>
                        </span>
                    </div>
                </div>
                <div class="post__title"><?php kttv_highlight_search_keyword_title(4, get_the_ID()) ?></div>
                <div class="post__description"><?php kttv_highlight_search_keyword_excerpt(7, get_the_ID()); ?></div>
            </div>
        </a>
    </div>
</li>