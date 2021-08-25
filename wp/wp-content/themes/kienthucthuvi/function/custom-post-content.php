<?php

if (!function_exists('kttv_post_excerpt')) {
    function kttv_post_excerpt($limit, $id_post)
    {
        $excerpt = explode(' ', get_the_excerpt(), $limit);
        array_pop($excerpt);
        $excerpt = implode(' ', $excerpt) . '... Xem thêm';
        echo $excerpt;
    }
    // function kttv_post_title($limit, $id_post){
    //     $title = explode(' ', get_the_excerpt(), $limit);
    //     array_pop($title);
    //     $title = implode(' ', $title);
    //     echo $title;
    // }

    if (!function_exists('kttv_highlight_search_keyword_title')) {
        function kttv_highlight_search_keyword_title()
        {
            $title = get_the_title();
            $keys = implode('|', explode(' ', get_search_query()));
            $title = preg_replace('/(' . $keys . ')/iu', '<span class="search__selection">\0</span>', $title);
            echo $title;
        }
    }

    if (!function_exists('kttv_highlight_search_keyword_excerpt')) {
        function kttv_highlight_search_keyword_excerpt($limit, $id_post)
        {
            $excerpt = get_the_excerpt();
            $keys = implode('|', explode(' ', get_search_query()));
            // limit words
            $excerpt = explode(' ', get_the_excerpt(), $limit);
            array_pop($excerpt);
            $excerpt = implode(" ", $excerpt);
            // highlight keywords
            $excerpt = preg_replace('/(' . $keys . ')/iu', '<strong class="search__selection"></strong>', $excerpt)
                . '... <b><a class="ml-2 mr-2" href="' . get_permalink($id_post) . '">' . 'Xem thêm' . '</a></b>';
            echo $excerpt;
        }
    }
}
