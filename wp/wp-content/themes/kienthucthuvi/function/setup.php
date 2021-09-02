<?php
if (!function_exists('kttv_theme_setup')) {
    function kttv_theme_setup()
    {
        add_filter('use_block_editor_for_post', '__return_false');
        //title_tag
        add_theme_support('title_tag');
        add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));

        //menu


        //post thumbnail
        add_theme_support('post-thumbnails');
        //linl rss
        add_theme_support('automatic-feed-link');
        add_image_size('grid_post_thumbnail', 500, 300, true);
        add_theme_support('post-formasts', array(
            'quote'
        ));


    


        //count view
        function gt_get_post_view()
        {
            $count = get_post_meta(get_the_ID(), 'post_views_count', true);
            return $count . ' Lượt xem';
        }
        function gt_set_post_view()
        {
            $key = 'post_views_count';
            $post_id = get_the_ID();
            $count = (int) get_post_meta($post_id, $key, true);
            $count++;
            update_post_meta($post_id, $key, $count);
        }
        function gt_posts_column_views($columns)
        {
            $columns['post_views'] = 'Views';
            return $columns;
        }
        function gt_posts_custom_column_views($column)
        {
            if ($column === 'post_views') {
                echo gt_get_post_view();
            }
        }
        add_filter('manage_posts_columns', 'gt_posts_column_views');
        add_action('manage_posts_custom_column', 'gt_posts_custom_column_views');
    }
}
