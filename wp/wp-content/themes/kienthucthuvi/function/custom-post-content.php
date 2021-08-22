<?php

if(!function_exists('kttv_post_excerpt')){
    function kttv_post_excerpt($limit, $id_post){
        $excerpt = explode(' ', get_the_excerpt(), $limit);
        array_pop($excerpt);
        $excerpt = implode(' ', $excerpt).'... Xem thêm';
        echo $excerpt;
    }
    // function kttv_post_title($limit, $id_post){
    //     $title = explode(' ', get_the_excerpt(), $limit);
    //     array_pop($title);
    //     $title = implode(' ', $title);
    //     echo $title;
    // }
}