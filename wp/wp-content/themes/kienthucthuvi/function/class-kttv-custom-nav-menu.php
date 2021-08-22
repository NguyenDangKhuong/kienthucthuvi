<?php

class KTTV_Custom_Nav_Walker extends Walker_Nav_Menu
{
    public function start_lvl(&$output, $depth = 0, $agrs = array())
    {
        $class_ul = '';
        if($depth === 0) {
            $class_ul .= ' multi-level ';
        } else if ($depth > 0) {
            $class_ul .= ' end-level ';
        }
        $output .= '<ul class="dropdown-menu' . $class_ul .'">';
    }

    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $class_li = $class_a = '';
        //lấy class mặc định wp
        $array_class_li = empty($item->classes) ? array() : (array) $item->classes;
        //add class định danh
        array_push($array_class_li, 'menu-item-' . $item->ID);
        //chuyển từ mảng sang chuỗi
        $class_li = implode(' ', apply_filters('nav_menu_css_class', array_filter($array_class_li), $item, $args));
        //kiểm tra có con thì thêm class
        if ($args->has_children && $depth === 0) {
            $class_li .= ' dropdown ';
        } else if ($args->has_children && $depth > 0) {
            $class_li .= ' dropdown-submenu ';
        }
        //kiểm tra link có active hay không
        if (in_array('current-menu-item', $array_class_li)) {
            $class_a .= ' active ';
        }
        $class_li = !empty($class_li) ? ' class="' . esc_attr($class_li) . '" ' : '';
        $class_a = !empty($class_a) ? ' class="' . esc_attr($class_a) . '" ' : '';

        $id_li = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id_li = !empty($id_li) ? ' id="' . esc_attr($id_li) . '" ' : '';

        //ghép nối thẻ li
        $output .= '<li' . $id_li . $class_li . '>';
        //chỉnh sửa thẻ a
        $atts = array();
        $atts['title']  = !empty($item->title)    ? $item->title    : '';
        $atts['target'] = !empty($item->target)    ? $item->target    : '';
        $atts['rel']    = !empty($item->xfn)        ? $item->xfn    : '';

        // If item has_children add atts to a.
        // if ( $args->has_children && $depth === 0 ) {
        if ($args->has_children) {
            $atts['href']           = '#';
            // $atts['data-toggle']    = 'dropdown';
            $atts['class']            = 'dropdown-toggle';
        } else {
            $atts['href'] = !empty($item->url) ? $item->url : '';
        }

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);

        $attr_a = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attr_a .= ' ' . $attr . '="' . $value . '"';
            }
        }

        //ghép nối thẻ a
        $item_output = $args->before;
        $item_output .= '<a' . $attr_a . ' ' . $class_a . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= ($args->has_children && $depth === 0) ? ' <i class=""></i></a>' : '</a>';
        $item_output .= $args->after;
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    public function end_el(&$output, $item, $depth = 0, $agrs = array(), $id = 0)
    {
        $output .= '</li>';
    }

    public function end_lvl(&$output, $depth = 0, $agrs = array())
    {
        $output .= '</ul>';
    }

    public function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output)
    {
        if (!$element)
            return;

        $id_field = $this->db_fields['id'];

        // Display this element.
        if (is_object($args[0]))
            $args[0]->has_children = !empty($children_elements[$element->$id_field]);

        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}
