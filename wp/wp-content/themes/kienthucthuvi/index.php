<?php
get_header();
//wpb_set_post_views(get_the_ID());
 // wpb_get_post_views(get_the_ID());
?>

<div class="container">
    <div class="content">
        <div class="main">
            <section class="post">
                <?php
                $args_my_query = array(
                    'post_type' => 'post'
                );
                $query = new WP_Query($args_my_query);
                if ($query->have_posts()) :
                ?>
                    <ul class="post__list">
                        <?php
                        while ($query->have_posts()) :
                            $query->the_post();
                            $args['query'] = $query;
                            $args['type'] = 'post';
                            get_template_part('partials/content', 'index', $args);
                        endwhile;
                        ?>
                    </ul>
                <?php
                // kttv_custom_pagination();
                endif;
                wp_reset_query();
                ?>
            </section>
            <section class="news">
                <div class="news__head">
                    <a class="news__head-link">
                        Tin tức
                    </a>
                </div>
                <?php
                $query = new WP_Query(array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'cat' => 1,
                    'orderby' => 'ID',
                    'order' => 'DESC',
                    'posts_per_page' => 6
                ));
                if ($query->have_posts()) :
                ?>
                    <ul class="news__list">
                        <?php while ($query->have_posts()) : $query->the_post();
                            $args['query'] = $query;
                            $args['type'] = 'news';
                            get_template_part('partials/content', 'index', $args);
                        endwhile;
                        ?>
                    </ul>
                <?php
                endif;
                wp_reset_query();
                ?>
            </section>
            <div class="dual-section">
                <div class="investment">
                    <div class="investment__head">
                        <a class="investment__head-link">
                            Đầu tư
                        </a>
                    </div>
                    <?php
                    $query = new WP_Query(array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'cat' => 2,
                        'orderby' => 'ID',
                        'order' => 'DESC',
                        'posts_per_page' => 4
                    ));
                    ?>
                    <ul class="investment__list">
                        <?php while ($query->have_posts()) : $query->the_post();
                            $args['query'] = $query;
                            $args['type'] = 'investment';
                            get_template_part('partials/content', 'index', $args);
                        ?>
                        <?php endwhile;
                        wp_reset_query();
                        ?>
                    </ul>
                </div>
                <div class="tech">
                    <div class="tech__head">
                        <a class="tech__head-link">
                            Công nghệ
                        </a>
                    </div>
                    <?php
                    $query = new WP_Query(array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'cat' => 2,
                        'orderby' => 'ID',
                        'order' => 'DESC',
                        'posts_per_page' => 4
                    ));
                    ?>
                    <ul class="tech__list">
                        <?php while ($query->have_posts()) : $query->the_post();
                            $args['query'] = $query;
                            $args['type'] = 'tech';
                            get_template_part('partials/content', 'index', $args);
                        ?>
                        <?php endwhile;
                        wp_reset_query();
                        ?>
                    </ul>
                </div>
            </div>
        </div>

        <?php
        get_sidebar();
        ?>
    </div>
</div>

<?php
get_footer();
?>