<div class=sidebar>
    <?php
    if (is_active_sidebar('kttv_primary_sidebar')) {
        dynamic_sidebar('kttv_primary_sidebar');
    }
    //     wpb_set_post_views(get_the_ID());
    //   wpb_get_post_views(get_the_ID());
    ?>
    <section class="popular-sidebar">
        <div class="popular-sidebar__main-title">Bài viết nổi bật</div>
        <?php
        $args_my_query = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 5,
            'meta_key' => 'wpb_post_views_count',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
            'offset' => 1
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
</div>