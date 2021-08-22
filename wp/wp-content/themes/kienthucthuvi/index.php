<?php
get_header();
?>

<div class="container">
    <div class="content">
        <div class="post">
            <?php
            $args_my_query = array(
                'post_type' => 'post',
                // 'orderby' => 'rand'
            );
            $my_query = new WP_Query($args_my_query);
            if ($my_query->have_posts()) :
            ?>
                <ul class="post__list">
                    <?php
                    while ($my_query->have_posts()) :
                        $my_query->the_post();
                        get_template_part('partials/content', 'index-primary-item');
                    endwhile;
                    ?>
                </ul>
            <?php
                kttv_custom_pagination();
            endif;
            ?>
            </ul>
        </div>

        <?php
        get_sidebar();
        ?>
    </div>
</div>

<?php
get_footer();
?>