<?php
get_header();
?>

<div class="container">
    <div class="content">
        <div class="main">
            <section class="post">
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
                <div class="news__head">
                    <a class="news__head-link" href="<?php echo site_url().'/category/news/'?>">
                        Tin tức
                    </a>
                </div>
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
                    <div class="share__head">
                        <a class="share__head-link" href="<?php echo site_url().'/category/share/'?>">
                            Chia sẻ
                        </a>
                    </div>
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
                <div class="tech">
                    <div class="tech__head">
                        <a class="tech__head-link" href="<?php echo site_url().'/category/tech/'?>">
                            Công nghệ
                        </a>
                    </div>
                    <?php
                    $query = new WP_Query(array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'category_name' => 'tech',
                        'orderby' => 'date',
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