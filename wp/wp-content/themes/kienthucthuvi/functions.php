<?php

//Set up - defined
define('THEME_URI', get_theme_file_uri());
define('THEME_PATH', get_theme_file_path());

//Include 
include(THEME_PATH . '/includes/enqueue.php');
include(THEME_PATH . '/includes/setup.php');
include(THEME_PATH . '/includes/class-kttv-custom-nav-menu.php');
include(THEME_PATH . '/includes/register-sidebars.php');

//actions
add_action('wp_enqueue_scripts', 'kttv_enqueue');
add_action('init', 'kttv_theme_setup');
function custom_theme_setup() {
    register_nav_menus( array(
            'primary' => esc_html__( 'kttv-primary-menu', 'kttv' ),
            'footer'  => esc_html__( 'Footer Menu', 'nepalbuzz' ),
    ) );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );
add_action( 'widgets_init', 'kttv_sidebar_init' );