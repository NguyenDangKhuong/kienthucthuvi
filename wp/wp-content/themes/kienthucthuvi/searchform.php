<form class="header__search-form <?php echo is_search() ? 'header__search-form--show' : '' ?>" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="header__search-icon"></div>
    <div class="header__search-wrapper <?php echo is_search() ? 'header__search-wrapper--show' : '' ?>">
        <input class="header__search-input <?php echo is_search() ? 'header__search-input--show' : '' ?>" type="search" name="s" placeholder="<?php echo 'Nhập từ khoá cần tìm kiếm'; ?>" value="<?php the_search_query(); ?>" id="<?php echo esc_attr(uniqid('search-form-')); ?>" />
    </div>
</form>