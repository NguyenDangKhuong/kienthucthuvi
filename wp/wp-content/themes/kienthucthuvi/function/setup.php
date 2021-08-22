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
    }
}
