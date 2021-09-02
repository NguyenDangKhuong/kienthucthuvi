<div class=sidebar>
    <?php
    if (is_active_sidebar('kttv_primary_sidebar')) {
        dynamic_sidebar('kttv_primary_sidebar');
    }
    ?>
    <section class="popular-sidebar">
        <div class="popular-sidebar__main-title">Bài viết nổi bật</div>
        <?php
        $args_my_query = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 10,
            'meta_key' => 'wpb_post_views_count',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
            'offset' => 0
        );
        $query = new WP_Query($args_my_query);
        if ($query->have_posts()) :
        ?>
            <ul class="popular-sidebar__list">
                <?php
                while ($query->have_posts()) :
                    $query->the_post();
                    $args['query'] = $query;
                    $args['type'] = 'popular-sidebar';
                    get_template_part('partials/content', 'index', $args);
                endwhile;
                ?>
            </ul>
        <?php
        endif;
        wp_reset_query();
        ?>
    </section>
    <section class="categories">
        <div class="categories__main-title">Chuyên mục</div>
        <div class="categories__list">
            <?php
            $categories = get_categories(array(
                'orderby' => 'name',
                'order'   => 'ASC'
            ));
            foreach ($categories as $category) {
                echo '<a href="' . get_category_link($category->term_id) . '"><div class="categories__item">' . $category->name . '</div></a>';
            }
            ?>
        </div>
    </section>
    <section class="comment-sidebar">
        <div class="comment-sidebar__title">Bình luận</div>
        <?php
        global $wp_query;
        $post_author_id = $wp_query->post->post_author;
        $args = array(
            'orderby' => 'comment_ID',
            'number'    => '5'
        );
        $comment_query = new WP_Comment_Query;
        $comments = $comment_query->query($args);

        ?>
        <div class="comment-sidebar__list-wrapper">
            <ul class="comment-sidebar__list">
                <?php
                if ($comments) {
                    // Loop over comments.
                    foreach ($comments as $comment) {
                        echo    ' <li class="comment-sidebar__item">
                                    <div class="comment-sidebar__image-wrapper">
                                        <img class="comment-sidebar__image" src="' . get_bloginfo('template_directory') . '/assets/images/avatar.jpg">
                                    </div>
                                    <div class="comment-sidebar__info">
                                        <a href="' . get_permalink($comment->comment_post_ID) . '" class="comment-sidebar__author-link" >
                                            <h2 class="comment-sidebar__author">' . $comment->comment_author . '</h2>
                                        </a>
                                        <div class="comment-sidebar__comment">' . $comment->comment_content . '</div>
                                    </div>
                                </li>';
                    }
                } else {
                    echo '<div class="comment-sidebar__no-comments">Không có comment nào</div>';
                }

                ?>
            </ul>
        </div>
    </section>
</div>