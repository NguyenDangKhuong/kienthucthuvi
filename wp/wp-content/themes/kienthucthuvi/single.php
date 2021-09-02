<?php
get_header();
?>

<div class="container">
    <div class="content">
        <div class="detail">
            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
                    gt_set_post_view();
                    get_template_part('partials/content', 'detail');
                endwhile;
            endif;
            // wpb_set_post_views(get_the_ID());
            // wpb_get_post_views(get_the_ID());
            ?>
        </div>
        <?php
        get_sidebar();
        ?>
    </div>
</div>
</div>

<?php
get_footer();
?>