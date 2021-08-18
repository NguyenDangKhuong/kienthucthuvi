<?php
if (!function_exists('kttv_theme_setup')) {
    function kttv_theme_setup()
    {
        add_theme_support('title_tag');
        add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
    }
}
