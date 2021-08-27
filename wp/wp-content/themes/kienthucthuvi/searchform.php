<form class="header__search-form" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="header__search-icon"></div>
    <div class="header__search-wrapper">
        <input class="header__search-input" type="search" name="s" placeholder="<?php echo 'Nhập từ khoá cần tìm kiếm'; ?>" value="<?php the_search_query(); ?>" id="<?php echo esc_attr(uniqid('search-form-')); ?>" />
    </div>
    <button aria-label="Search" type="submit" class="header__search-button"><i class="zmdi zmdi-search"></i></button>
</form>