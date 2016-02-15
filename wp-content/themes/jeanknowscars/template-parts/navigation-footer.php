<?php
/* 
 * To display footer links
 */

$features = array('menu' => 'features', 'container' => '', 'container_class' => '', 'container_id' => '', 'menu_class' => '', 'menu_id' => '',
    'echo' => true, 'fallback_cb' => 'wp_page_menu', 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'depth' => 1, 'walker' => '', 'theme_location' => '');

$about_us = array('menu' => 'About Us', 'container' => '', 'container_class' => '', 'container_id' => '', 'menu_class' => '', 'menu_id' => '',
    'echo' => true, 'fallback_cb' => 'wp_page_menu', 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'depth' => 1, 'walker' => '', 'theme_location' => '');

$company = array('menu' => 'Company', 'container' => '', 'container_class' => '', 'container_id' => '', 'menu_class' => '', 'menu_id' => '',
    'echo' => true, 'fallback_cb' => 'wp_page_menu', 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'depth' => 1, 'walker' => '', 'theme_location' => '');
?>
<div class="nav-list-wrapper">
    <nav class="nav-list"><h5>Features</h5><?php wp_nav_menu($features);?></nav>
    <nav class="nav-list"><h5>About Us</h5><?php wp_nav_menu($about_us);?></nav>
    <nav class="nav-list"><h5>Company</h5><?php wp_nav_menu($company);?></nav>
</div>