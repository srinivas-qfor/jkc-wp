<?php
/*
 * To display Main Menu
 */

/*
 * Adding custom class for links <li>
 */
function add_classes_on_li($classes, $item, $args) {
    $classes[] = 'nav-item';
    if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_classes_on_li', 1, 3);

/*
 * Adding custom class for anchors <a>
 */
function add_classes_on_a($atts, $item, $args) {
    $atts['class'] = 'button-link';
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_classes_on_a', 10, 3);


$defaults = array('menu' => 'mobile', 'container' => 'nav', 'container_class' => 'menu-wrap', 'container_id' => '', 'menu_class' => 'main-menu nav-list clearfix', 'menu_id' => '', 'echo' => true, 'items_wrap' => '<ul id="%1$s" class="primary-menu">%3$s</ul>',
    'depth' => 1, 'walker' => '', 'theme_location' => '');

// Render main menu
wp_nav_menu($defaults);
