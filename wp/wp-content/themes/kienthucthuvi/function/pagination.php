l<?php
    if (!function_exists('kttv_custom_pagination')) {
        function kttv_custom_pagination(WP_Query $wp_query = null, $echo = true)
        {
            if ($wp_query === null) {
                global $wp_query;
            }
            $pages = paginate_links(array(
                'base' => str_replace(9999999999, '%#%', esc_url(get_pagenum_link(9999999999))),
                'format' => '?page=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages,
                'type' => 'array',
                'show_all' => false,
                'end_size' => 2,
                'mid_size' => 1,
                'prev_next' => true,
                'prev_text' => '<div class="pagination__link"><div class="pagination__arrow pagination__arrow--prev"></div></div>',
                'next_text' => '<div class="pagination__link"><div class="pagination__arrow pagination__arrow--next"></div></div>',
                'add_args' => false,
                'add_fragment' => ''
            ));
            if (is_array($pages)) {
                $pagination = '<div class="pagination">
            <ul class="pagination__list">';
                foreach ($pages as $page) {
                    $pagination .= '<li class="pagination__item' . (strpos($page, 'current') !== false ? ' pagination__active" ' : '"') . '>';
                    if(strpos($page, 'current') !== false){
                        if(get_query_var('paged') > 1) {
                            $pagination .= '<a class="pagination__link a">'. get_query_var('paged') .'</a>';
                        } else {
                            $pagination .= '<a class="pagination__link">'. 1 .'</a>'; 
                        }
                    } else {
                        $pagination .= str_replace('class="page-numbers"', 'class="pagination__link b"', $page);
                    }

                    $pagination .= '</li>';
                }

                $pagination .= '</ul>
            </div>';
                echo $pagination;
            }
            return null;
        }
    }
