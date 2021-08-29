<?php
get_header();
?>

<div class="container">
    <div class="content">
        <div class="main">
            <div class="search">
                <?php
                global $query_string;
                wp_parse_str($query_string, $search_args);
                $search_query = new WP_Query($search_args);
                $total_results = $search_query->found_posts ? $search_query->found_posts : 0;
                echo '<h3 class="search__result"> ';
                printf('Có %1$s kết quả cho tìm kiếm của bạn', $total_results);
                echo '</h3>';

                if ($search_query->have_posts()) :
                ?>
                    <ul class="search__list">
                        <?php
                        while ($search_query->have_posts()) :
                            $search_query->the_post();
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