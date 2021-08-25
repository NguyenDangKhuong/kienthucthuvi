<?php
get_header();
?>

<div class="container">
    <div class="content">
        <div class="">
            <div class="detail">
                <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                        get_template_part('partials/content', 'detail');
                    endwhile;
                endif;
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