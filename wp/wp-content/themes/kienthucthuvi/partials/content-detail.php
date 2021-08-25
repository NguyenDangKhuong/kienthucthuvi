<?php
if (function_exists('yoast_breadcrumb')) {
    yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
}
?>
<div class="detail__content">
    <div class="detail__title"><?php the_title() ?></div>
    <div class="detail__head">
        <div class="detail__author">
            <div class="detail__author-avatar">
                <?php echo get_avatar(get_the_author_meta('ID'), 40) ?>
            </div>
            <div class="detail__author-name"><?php the_author() ?></div>
        </div>
        <!-- <div>
            Chức vụ: -->
        <?php
        // $user_meta = get_userdata(get_the_author_meta('ID'));
        // echo $user_meta->roles[0];
        ?>
        <!-- </div> -->
        <div>
            <div class="detail__date"><?php the_date('d/m/Y'); ?></div>
            <div class="detail__comment"><?php echo get_comments_number(get_the_ID()); ?></div>
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
<div class="relation">
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
    $rl_posts_query = new WP_Query([
        'post_type' => 'post',
        'posts_per_page'     => 2,
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
    if ($rl_posts_query->have_posts()) :
    ?>
        <ul class="post__list">
            <?php
            while ($rl_posts_query->have_posts()) :
                $rl_posts_query->the_post();
                get_template_part('partials/content', 'index-primary-item');
            endwhile;
            ?>
        </ul>
    <?php
    endif;
    wp_reset_query();
    ?>
</div>
<div class="tags">
    Tags:
    <?php the_tags('<div class="tags__list">', ' ', '</div>') ?>
</div>
<div class="category">
    Categories:
    <?php the_category(' ', '', '') ?>
</div>

<?php
if (comments_open() || get_comments_number()) {
    comments_template();
}
?>