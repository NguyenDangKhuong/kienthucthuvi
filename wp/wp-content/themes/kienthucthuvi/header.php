<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0" id="js-viewport">
    <!-- <link rel="shortcut icon" href="<?= URL_FAVICON ?>">
    <link rel="apple-touch-icon-precomposed" href="<?= URL_TOUCH_ICON ?>">
    <link rel="stylesheet" href="<?= URL_APP_CSS ?>"> -->
    <!-- <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat"> -->
    <!-- <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Inter"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/viewport-extra@1.1.0/dist/viewport-extra.min.js"></script> -->
    <!-- For 320px Viewport -->
    <!-- <script>
        if (window.screen.width < 375) {
            document.getElementById('js-viewport').setAttribute('content', 'width=375, initial-scale=' + 320 / 375 + ', user-scalable=no');
        } else if (window.screen.width >= 375) {
            document.getElementById('js-viewport').setAttribute('content', 'width=375, initial-scale=1, user-scalable=yes');
        }
    </script> -->
    <!-- IPAD VIEWPORT FIX -->
    <!-- <script>
        var ua = navigator.userAgent
        var sp = (ua.indexOf('iPhone') > 0 || ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0)
        var tab = (ua.indexOf('iPad') > 0 || (!sp && ua.indexOf('Android') > 0))
        new ViewportExtra(tab ? 1280 : 375)
        var isIOS = /iPad/.test(navigator.platform) || (navigator.platform === 'MacIntel' && navigator.maxTouchPoints > 1);
        var checkVersion = /Version\/14/;
        if(isIOS && checkVersion.test(navigator.userAgent) ) {
            document.querySelector("meta[name='viewport']").setAttribute('content', 'width=1300');
        }
    </script>  -->
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
                <h1 class="header__logo">
                    <?php if (is_home()) : ?>
                        <h1>
                            <a href="<?php echo home_url(); ?>">
                                Kienthucthuvi
                                <!-- <img class="header-logo-image" src="<?php // echo resolve_uri('/assets/svg/logo.svg'); 
                                                                            ?>" alt="LIG Vietnam" /> -->
                            </a>
                        </h1>
                    <?php else : ?>
                        <a href="<?php echo home_url(); ?>">
                            Kienthucthuvi
                            <!-- <img class="header-logo-image" src="<?php // echo resolve_uri('/assets/svg/logo.svg'); 
                                                                        ?>" alt="LIG Vietnam" /> -->
                        </a>
                    <?php endif ?>
                </h1>
                <div class="header__search-box">
                    <form class="header__search-form">
                        <input type="text" class="head__search-input" />
                        <input type="submit" class="head__search-input-btn" />
                    </form>
                </div>
                <div class="header__login">Đăng nhập</div>
            </div>
        </div>
    </div>
    <section class="header__nav">
        <div class="container">
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
    </section>