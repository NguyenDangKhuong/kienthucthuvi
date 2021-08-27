<?php

//Set up - defined
define('THEME_URI', get_theme_file_uri());
define('THEME_PATH', get_theme_file_path());

//Include 
include(THEME_PATH . '/function/enqueue.php');
include(THEME_PATH . '/function/setup.php');
include(THEME_PATH . '/function/class-kttv-custom-nav-menu.php');
include(THEME_PATH . '/function/register-sidebars.php');
include(THEME_PATH . '/function/custom-post-content.php');
include(THEME_PATH . '/function/pagination.php');

//actions
add_action('wp_enqueue_scripts', 'kttv_enqueue');
add_action('init', 'kttv_theme_setup');
function custom_theme_setup() {
    register_nav_menus( array(
            'primary' => esc_html__( 'kttv-primary-menu', 'kttv' ),
            // 'footer'  => esc_html__( 'Footer Menu', 'nepalbuzz' ),
    ) );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );
add_action( 'widgets_init', 'kttv_sidebar_init' );


//poppular
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');
function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}