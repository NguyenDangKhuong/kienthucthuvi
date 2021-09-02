<div class="detail__content">
    <h1 class="detail__title"><?php the_title() ?></h1>
    <div class="detail__head">
        <div class="detail__author">
            <div class="detail__author-avatar">
                <?php echo get_avatar(get_the_author_meta('ID'), 40) ?>
            </div>
            <div>
                <div class="detail__author-name">
                    <?php the_author() ?>
                </div>
                <div class="detail__date"><?php the_date('h:i:s d/m/Y'); ?></div>
            </div>
        </div>
        <!-- <div>
            Chức vụ: -->
        <?php
        // $user_meta = get_userdata(get_the_author_meta('ID'));
        // echo $user_meta->roles[0];
        ?>
        <!-- </div> -->
        <div class="detail__align-right">
            <div class="detail__comment">
                <div class="detail__comment-icon"></div><?php echo get_comments_number(get_the_ID()); ?>
            </div>
            <div class="detail__views"><?= gt_get_post_view(); ?></div>
        </div>
    </div>
</div>
<div class="detail__image" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id()) ?>')"></div>
<div class="detail__post">
    <?php
    the_content();

    //paging của detail
    // wp_link_pages();
    ?>
</div>

<div class="tags">
    <?php the_tags('<div class="tags__list">', ' ', '</div>') ?>
</div>
<div class="share-social">
    <div class="share-social__title">Nếu bạn thích bài viết này, hãy chia sẽ trên:</div>
    <ul class="share-social__list">
        <li class="share-social__item">
            <a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()) ?>">
                <div class="share-social__item-wrapper share-social__item-facebook">
                    <img src="/wp-content/themes/kienthucthuvi/assets/svg/share/facebook.svg" />
                </div>
            </a>
        </li>
        <li class="share-social__item">
            <a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()) ?>">
                <div class="share-social__item-wrapper share-social__item-twitter">
                    <img src="/wp-content/themes/kienthucthuvi/assets/svg/share/twitter.svg" />
                </div>
            </a>
        </li>
        <li class="share-social__item">
            <a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()) ?>">
                <div class="share-social__item-wrapper share-social__item-linkedin">
                    <img src="/wp-content/themes/kienthucthuvi/assets/svg/share/linkedin.svg" />
                </div>
            </a>
        </li>
        <li class="share-social__item">
            <a target="_blank" href="https://pinterest.com/pin/create/bookmarklet/?media=[post-img]&url=<?php echo urlencode(get_permalink()) ?>">
                <div class="share-social__item-wrapper share-social__item-pinterest">
                    <img src="/wp-content/themes/kienthucthuvi/assets/svg/share/pinterest.svg" />
                </div>
            </a>
        </li>
        <li class="share-social__item">
            <a target="_blank" href="whatsapp://send?text=<?php echo urlencode(get_permalink()) ?>">
                <div class="share-social__item-wrapper share-social__item-whatsapp">
                    <img src="/wp-content/themes/kienthucthuvi/assets/svg/share/whatsapp.svg" />
                </div>
            </a>
        </li>
        <li class="share-social__item">
            <a target="_blank" href="http://www.reddit.com/submit?url=<?php echo urlencode(get_permalink()) ?>">
                <div class="share-social__item-wrapper share-social__item-reddit">
                    <img src="/wp-content/themes/kienthucthuvi/assets/svg/share/reddit.svg" />
                </div>
            </a>
        </li>
    </ul>
</div>
<div class="detail-category">
    <div class="detail-category__title">Categories:</div>
    <div class="detail-category__list">
        <?php the_category(' ', '', '') ?>
    </div>
</div>

<div class="related">
    <?php
    $post_not_in_id = array();
    array_push($post_not_in_id, get_the_ID());
    $categories = get_the_category() ? get_the_category() : array();
    $tags = get_the_tags() ? get_the_tags() : array();
    $cat_id_list = array();
    foreach ($categories as $cat) {
        array_push($cat_id_list, $cat->term_id);
    }
    $tag_id_list = array();
    foreach ($tags as $tag) {
        array_push($tag_id_list, $tag->term_id);
    }
    $query = new WP_Query([
        'post_type' => 'post',
        'posts_per_page'     => 4,
        'post__not_in'      => $post_not_in_id,
        'tax_query' => [
            'relation' => 'OR',
            [
                'taxonomy' => 'category',
                'field' => 'id',
                'terms' => $cat_id_list,
                'include_children' => true,
                'operator' => 'IN'
            ],
            [
                'taxonomy' => 'tag',
                'field' => 'id',
                'terms' => $tag_id_list,
                'include_children' => true,
                'operator' => 'IN'
            ]
        ]
    ]);
    if ($query->have_posts()) :
    ?>
        <div class="related__main-title">Bài viết liên quan</div>
        <div class="related__slider-nav">
            <div class="related__btn related__prev"></div>
            <div class="related__btn related__next"></div>
        </div>
        <ul class="related__list">
            <?php
            while ($query->have_posts()) : $query->the_post();
                $args['query'] = $query;
                $args['type'] = 'related';
                get_template_part('partials/content', 'index', $args);
            endwhile;
            ?>
        </ul>
    <?php
    endif;
    wp_reset_query();
    ?>
</div>

<?php
if (comments_open() || get_comments_number()) {
    comments_template();
}
?>