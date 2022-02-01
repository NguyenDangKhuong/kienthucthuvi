<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XSGBX71TSL"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-XSGBX71TSL');
    </script>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0" id="js-viewport">
    <link rel="shortcut icon" href="/wp-content/themes/kienthucthuvi/assets/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/wp-content/themes/kienthucthuvi/assets/images/favicon.ico" type="image/x-icon">
    <link rel="icon" type="image/svg+xml" href="/assets/images/favicon.svg">
    <link rel="icon" type="image/png" href="/assets/images/favicon.png">
    <!-- <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat"> -->
    <!-- <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Inter"> -->
    <script src="https://cdn.jsdelivr.net/npm/viewport-extra@1.1.0/dist/viewport-extra.min.js"></script>
    <!-- For 320px Viewport -->
    <script>
        if (window.screen.width < 375) {
            document.getElementById('js-viewport').setAttribute('content', 'width=375, initial-scale=' + 320 / 375 + ', user-scalable=no');
        } else if (window.screen.width >= 375) {
            document.getElementById('js-viewport').setAttribute('content', 'width=375, initial-scale=1, user-scalable=yes');
        }
    </script>
    <!-- IPAD VIEWPORT FIX -->
    <script>
        var ua = navigator.userAgent
        var sp = (ua.indexOf('iPhone') > 0 || ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0)
        var tab = (ua.indexOf('iPad') > 0 || (!sp && ua.indexOf('Android') > 0))
        new ViewportExtra(tab ? 1280 : 375)
        var isIOS = /iPad/.test(navigator.platform) || (navigator.platform === 'MacIntel' && navigator.maxTouchPoints > 1);
        var checkVersion = /Version\/14/;
        if(isIOS && checkVersion.test(navigator.userAgent) ) {
            document.querySelector("meta[name='viewport']").setAttribute('content', 'width=1300');
        }
    </script> 
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <?php //echo file_get_contents(get_stylesheet_directory() . '/assets/svg/sprite.svg'); 
    ?>
    <?php //import_part('header'); 
    ?>
    <div class="header__container">
        <div class="container">
            <div class="header">
                <div class="header__logo">
                    <?php if (is_home()) : ?>
                        <h1>
                            <a href="<?php echo home_url(); ?>">
                                <img class="header__logo-image" src="/wp-content/themes/kienthucthuvi/assets/svg/logo.svg" alt="Kienthucthuvi.org" />
                            </a>
                        </h1>
                    <?php else : ?>
                        <a href="<?php echo home_url(); ?>">
                            <img class="header__logo-image" src="/wp-content/themes/kienthucthuvi/assets/svg/logo.svg" alt="Kienthucthuvi.org" />
                        </a>
                    <?php endif ?>
                </div>
                <section class="header__menu is-pc-show">
                    <?php
                    // if(has_nav_menu('kttv_primary_menu')){
                    wp_nav_menu(array(
                        'theme-location' => 'kttv_primary_menu',
                        'container' => false,
                        'fallback_cb' => false,
                        'depth' => 5,
                        'walker' => new KTTV_Custom_Nav_Walker()
                    ));
                    // }
                    ?>
                </section>
                <div class="header__search">
                    <div class="header__search-box">
                        <?php get_search_form(); ?>
                    </div>
                    <div class="header__menu-btn">
                        <span class="header__menu-btn-span"></span>
                        <span class="header__menu-btn-span"></span>
                        <span class="header__menu-btn-span"></span>
                    </div>
                </div>
            </div>
            <div class="header__navigation">
                <div class="navigation">
                    <div class="navigation__icon">
                        <span class="navigation__icon-span"></span>
                        <span class="navigation__icon-span"></span>
                    </div>
                    <div class="header__logo">
                        <img class="header__logo-image" src="/wp-content/themes/kienthucthuvi/assets/svg/logo.svg" alt="Kienthucthuvi.org" />
                    </div>
                    <?php
                    // if(has_nav_menu('kttv_primary_menu')){
                    wp_nav_menu(array(
                        'theme-location' => 'kttv_primary_menu',
                        'container' => false,
                        'fallback_cb' => false,
                        'depth' => 5,
                        'walker' => new KTTV_Custom_Nav_Walker()
                    ));
                    // }
                    ?>
                </div>
                <section class="copyright">
                    @<?php echo date("Y"); ?> - All Right Reserved. Designed and Developed by <div class="copyright__tui">NDK</div>
                </section>
            </div>
            <div class="navigation__body-veil"></div>
        </div>
    </div>
    <?php
    if (function_exists('yoast_breadcrumb') && !is_home()) {
        yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumbs">', '</p>');
    }
    ?>