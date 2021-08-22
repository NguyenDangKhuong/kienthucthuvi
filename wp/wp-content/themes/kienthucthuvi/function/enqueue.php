<?php

if(!function_exists('kttv_enqueue')) {
    function kttv_enqueue() {
        $ver = time();
        //css
        wp_register_style('kttv_style', THEME_URI.'/assets/css/app.css');
        wp_register_style('kttv_boostrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');
        //enqueue
        wp_enqueue_style('kttv_style');
        // wp_enqueue_style('kttv_boostrap');

        //js
        wp_register_script('kttv_srcipt', THEME_URI.'/assets/js/app.js', array(), $ver);
        wp_register_script('kttv_popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js', array(), $ver);
        wp_register_script('kttv_boostrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', array(), $ver);
        //enqueue
        wp_enqueue_script('kttv_srcipt');
        // wp_enqueue_script('kttv_boostrap');
        // wp_enqueue_script('kttv_popper');
    }
}