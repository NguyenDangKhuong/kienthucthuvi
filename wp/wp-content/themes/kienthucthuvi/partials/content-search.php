
<li class="search__item">
    <a class="search__link" href="<?php the_permalink(); ?>">
        <div class="search__image-wrapper">
            <div class="search__image" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>')"></div>
        </div>
        <div class="search__info">
            <div class="search__title"><?php kttv_highlight_search_keyword_title(4, get_the_ID()); ?></div>
            <div class="search__wrapper">
                <div class="search__author"><?php the_author(); ?></div>
                <div class="search__date"><span><?php the_date('d/m/Y'); ?></span></div>
                <div class="search__comment">
                    <span class="search__comment-wrapper">
                        <div class="search__comment-icon"></div>
                        <?php echo get_comments_number(get_the_ID()) ?>
                    </span>
                </div>
            </div>
            <div class="search__description"><?php kttv_highlight_search_keyword_excerpt(20, get_the_ID()); ?></div>
        </div>
    </a>
</li>