<?php
get_header();
?>

<div class="container">
    <div class="content">
        <div class="main">
            <div class="archive">
                <div class="archive__title">
                    <h2>
                        <?php
                        if (is_tag()) :
                            printf(__('Các bài có tagged: %1$s', 'kttv'), single_tag_title('', false));
                        elseif (is_category()) :
                            printf(__('Các bài có chuyên mục: %1$s', 'kttv'), single_cat_title('', false));
                        elseif (is_day()) :
                            printf(__('Tin hàng ngày: %1$s', 'kttv'), get_the_time('l, F j, Y'));
                        elseif (is_month()) :
                            printf(__('Tin hằng tháng: %1$s', 'kttv'), get_the_time('F Y'));
                        elseif (is_year()) :
                            printf(__('Tin hằng năm: %1$s', 'kttv'), get_the_time('Y'));
                        endif;
                        ?>
                    </h2>
                </div>
                <?php

                if (have_posts()) :
                ?>
                    <ul class="archive__list">
                        <?php
                        while (have_posts()) :
                            the_post();
                            get_template_part('partials/content', 'search');
                        endwhile;
                        ?>
                    </ul>
                <?php
                    kttv_custom_pagination();
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