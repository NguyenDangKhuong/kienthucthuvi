<?php
get_header();
?>

<div class="container">
    <div class="content">
        <div class="main">
            <section class="post">
                <h2 class="post__head">
                    <a class="post__head-link" href="#">
                        BÀI VIẾT MỚI NHẤT
                    </a>
                </h2>
                <?php
                $args_my_query = array(
                    'post_type' => 'post',
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                    'post_status' => 'publish',
                    'posts_per_page' => 5
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
                <h2 class="news__head">
                    <a class="news__head-link" href="<?php echo site_url() . '/category/news/' ?>">
                        TIN TỨC
                    </a>
                </h2>
                <?php
                $query = new WP_Query(array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'category_name' => 'news',
                    'orderby' => 'date',
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
                <div class="share">
                    <h2 class="share__head">
                        <a class="share__head-link" href="<?php echo site_url() . '/category/share/' ?>">
                            CHIA SẺ
                        </a>
                    </h2>
                    <?php
                    $query = new WP_Query(array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'category_name' => 'share',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'posts_per_page' => 4
                    ));
                    ?>
                    <ul class="share__list">
                        <?php while ($query->have_posts()) : $query->the_post();
                            $args['query'] = $query;
                            $args['type'] = 'share';
                            get_template_part('partials/content', 'index', $args);
                        ?>
                        <?php endwhile;
                        wp_reset_query();
                        ?>
                    </ul>
                </div>
                <div class="skill">
                    <h2 class="skill__head">
                        <a class="skill__head-link" href="<?php echo site_url() . '/category/skill/' ?>">
                            THỦ THUẬT
                        </a>
                    </h2>
                    <?php
                    $query = new WP_Query(array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'category_name' => 'skill',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'posts_per_page' => 4
                    ));
                    ?>
                    <ul class="skill__list">
                        <?php while ($query->have_posts()) : $query->the_post();
                            $args['query'] = $query;
                            $args['type'] = 'skill';
                            get_template_part('partials/content', 'index', $args);
                        ?>
                        <?php endwhile;
                        wp_reset_query();
                        ?>
                    </ul>
                </div>
            </div>
            <div class="tech">
                <h2 class="tech__head">
                    <a class="tech__head-link" href="<?php echo site_url() . '/category/tech/' ?>">
                        CÔNG NGHỆ
                    </a>
                </h2>
                <?php
                $query = new WP_Query(array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'category_name' => 'tech',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'posts_per_page' => 5
                ));

                if ($query->have_posts()) :
                ?>
                    <ul class="tech__list">
                        <?php while ($query->have_posts()) : $query->the_post();
                            get_template_part('partials/content', 'search');
                        ?>
                        <?php endwhile;
                        wp_reset_query();
                        ?>
                    </ul>

                <?php
                endif;
                wp_reset_query();
                ?>
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