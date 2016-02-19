<?php

/* 
 * To display breadcrumbs navigation
 */

wp_enqueue_style( 'mod-breadcrumbs', get_template_directory_uri() . '/assets/css/mod-breadcrumbs.css');
    					
global $post;
    echo '<div class="mod-breadcrumbs clearfix">';
    if (!is_home()) {
        echo '<div class="crumb-wrap" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="';
        echo get_option('home');
        echo '">';
        echo 'Home';
        echo '</a></div><div class="separator"></div>';
        if (is_category() || is_single()) {
            echo '<div class="crumb-wrap" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">';
            the_category(' </div><div class="separator"> </div><div class="crumb-wrap" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"> ');
            if (is_single()) {
                echo '</div><div class="separator"> </div><div class="crumb-wrap" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">';
                the_title();
                echo '</div>';
            }
        } elseif (is_page()) {
            if($post->post_parent){
				if($post->post_parent){
					$anc = get_post_ancestors( $post->ID );
					$title = get_the_title();
					foreach ( $anc as $ancestor ) {
						$output = '<div class="crumb-wrap" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></div> <div class="separator">/</div>';
					}
					echo $output;
					echo '<strong title="'.$title.'"> '.$title.'</strong>';
				} else {
					echo '<div class="crumb-wrap" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><strong> '.get_the_title().'</strong></div>';
				}
			}
		}
	}
    echo '</div>';

