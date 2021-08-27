<section class="footer">
    <div class="container">
        <div class="footer__wrapper">
            <div class="footer__about">
                <div class="footer__title">Về Kienthucthuvi.org</div>
                <div class="footer__logo">
                <img class="footer__logo-image" src="/wp-content/themes/kienthucthuvi/assets/svg/logo-white.svg" alt="Kienthucthuvi.org" />
                </div>
                <div class="footer__about-description">Kienthucthuvi.org được lập nên để chia sẽ kiến thức hữu ích, kinh nghiệm thú vị, mẹo vặt cuộc sống đến tất cả mọi người. Chân thành cảm ơn các bạn đã ghé thăm và chúc các bạn sẽ có những phút giây thu giản cùng với Kienthucthuvi.org</div>
            </div>
            <div class="footer__popular">
                <div class="footer__title">Bài viết nổi bật</div>
                <div class="popular">
                    <?php
                    $args_my_query = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => 3,
                        'meta_key' => 'wpb_post_views_count',
                        'orderby' => 'meta_value_num',
                        'order' => 'DESC',
                        'offset' => 1
                    );
                    $query = new WP_Query($args_my_query);
                    if ($query->have_posts()) :
                    ?>
                        <ul class="popular__list">
                            <?php
                            while ($query->have_posts()) :
                                $query->the_post();
                                $args['query'] = $query;
                                $args['type'] = 'popular';
                                get_template_part('partials/content', 'index', $args);
                            endwhile;
                            ?>
                        </ul>
                    <?php
                    endif;
                    wp_reset_query();
                    ?>
                </div>
            </div>
            <div class="footer__recent">
                <div class="footer__title">Bài viết liên quan</div>
                <div class="recent">
                    <?php
                    $args_query = array(
                        'posts_per_page' => 3,
                        'offset' => 0,
                        'orderby' => 'post_date',
                        'order' => 'DESC',
                        'post_type' => 'post',
                        'post_status' => 'publish'
                    );
                    $query = new WP_Query($args_query);
                    if ($query->have_posts()) :
                    ?>
                        <ul class="recent__list">
                            <?php
                            while ($query->have_posts()) :
                                $query->the_post();
                                $args['query'] = $query;
                                $args['type'] = 'recent';
                                get_template_part('partials/content', 'index', $args);
                            endwhile;
                            ?>
                        </ul>
                    <?php
                    endif;
                    wp_reset_query();
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="copyright">
    @<?php echo date("Y"); ?> - All Right Reserved. Designed and Developed by <div class="copyright__tui">NDK</div>
</section>
<?php wp_footer(); ?>

</body>

</html>