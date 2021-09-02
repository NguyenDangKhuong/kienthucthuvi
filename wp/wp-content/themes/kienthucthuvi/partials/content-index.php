<?php
$query = $args['query'];
$type = $args['type'];
?>
<li class="<?php echo $type; ?>__item <?php echo $query->current_post == 0 ? $type . '__first' : ($query->current_post == 1 ? $type . '__second' : $type . '__small') ?>">
    <div class="<?php echo $type; ?>__flex">
        <a class="<?php echo $type; ?>__link" href="<?php the_permalink(); ?>">
            <div class="<?php echo $type; ?>__image-wrapper">
                <div class="<?php echo $type; ?>__image" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>')"></div>
            </div>
            <div class="<?php echo $type; ?>__info">
                <div class="<?php echo $type; ?>__title"><?php the_title(); ?></div>
                <div class="<?php echo $type; ?>__wrapper">
                    <div class="<?php echo $type; ?>__author"><?php the_author(); ?></div>
                    <div class="<?php echo $type; ?>__date">
                        <?php echo get_the_date('d/m/Y'); ?>
                    </div>
                    <div class="<?php echo $type; ?>__comment">
                        <span class="<?php echo $type; ?>__comment-wrapper">
                            <div class="<?php echo $type; ?>__comment-icon"></div>
                            <?php echo get_comments_number(get_the_ID()) ?>
                        </span>
                    </div>
                </div>
                <div class="<?php echo $type; ?>__description"><?php kttv_post_excerpt(25, get_the_ID()); ?></div>
            </div>
        </a>
    </div>
</li>