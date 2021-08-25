<?php
get_header();
?>

<div class="container">
    <div class="content">
        <div class="main">
            <div class="post">
                <?php
                $args_my_query = array(
                    'post_type' => 'post',
                    // 'orderby' => 'rand'
                );
                $query = new WP_Query($args_my_query);
                if ($query->have_posts()) :
                ?>
                    <ul class="post__list">
                        <?php
                        while ($query->have_posts()) :
                            $query->the_post();
                            $args['query'] = $query;
                            get_template_part('partials/content', 'index', $args);
                        endwhile;
                        ?>
                    </ul>
                <?php
                // kttv_custom_pagination();
                endif;
                wp_reset_query();
                ?>
                </ul>
            </div>
            <div class="news">
                <div class="news__head">
                    <a class="news__head-link">
                        Tin tức
                    </a>
                </div>
                <?php
                $news = new WP_Query(array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'cat' => 1,
                    'orderby' => 'ID',
                    'order' => 'DESC',
                    'posts_per_page' => 6
                ));
                ?>
                <ul class="news__list">
                    <?php while ($news->have_posts()) : $news->the_post();
                    $args['news'] = $news;
                        get_template_part('partials/content', 'news', $args);
                    ?>
                    <?php endwhile;
                    wp_reset_query();
                    ?>
                </ul>
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