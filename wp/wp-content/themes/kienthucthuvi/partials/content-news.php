<?php
$new = $args['news'];
?>
<li class="news__item">
    <div class="news__flex">
        <a class="news__link" href="<?php the_permalink(); ?>">
            <div class="news__image" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>')"></div>
            <div class="news__info">
                <div class="news__wrapper">
                    <div class="news__author"><?php the_author(); ?></div>
                    <div class="news__date">&nbsp;-&nbsp;<span><?php the_date('d/m/Y'); ?></span></div>
                    <div class="news__comment">
                        &nbsp;-&nbsp;
                        <span class="news__comment-wrapper">
                            <div class="news__comment-icon"></div>
                            <?php echo get_comments_number(get_the_ID()) ?>
                        </span>
                    </div>
                </div>
                <div class="news__title<?php echo $new->current_post //== 0 ? ' news__title-first' : ($my_query->current_post == 1 ? ' news__title-second' : '') ?>"><?php the_title(); ?></div>
                <div class="news__description"><?php kttv_post_excerpt(12, get_the_ID()) ?></div>
            </div>
        </a>
    </div>
</li>