<?php

if(!function_exists('kttv_sidebar_init')) {
    function kttv_sidebar_init() {
        register_sidebar(array(
            'name' => __('Primary Sidebar', 'kttv'),
            'id' => 'kttv_primary_sidebar',
            'description' => 'Sidebar for Kienthucthuvi theme',
            'before_widget' => '<div class="kttv-widget">',
            'after_widget' => '</div>',
            'before_title' => '<div class="kttv-widget-title"',
            'after_title' => '</div>',
        ));
    }
}