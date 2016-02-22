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
            $category = get_the_category();
            if(!empty($category)) {
                echo get_category_parents_custom($category[0]->cat_ID, true, '', false, array(), '<div class="crumb-wrap" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">', '</div>');
            }
            if (is_single()) {
                echo '<div class="crumb-wrap" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><span class="crumb" itemprop="title">';
                the_title();
                echo '</div></span>';
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
			} else {
                echo '<div class="crumb-wrap" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><span class="crumb" itemprop="title"> '.get_the_title().'</span></div>';
            }
		}
	}
    echo '</div>';

    function get_category_parents_custom( $id, $link = false, $separator = '/', $nicename = false, $visited = array(), $prepend = '', $append = '' ) {
        $chain = '';
        $parent = get_term( $id, 'category' );
        if ( is_wp_error( $parent ) )
            return $parent;

        if ( $nicename )
            $name = $parent->slug;
        else
            $name = $parent->name;

        if ( $parent->parent && ( $parent->parent != $parent->term_id ) && !in_array( $parent->parent, $visited ) ) {
            $visited[] = $parent->parent;
            $chain .= get_category_parents_custom( $parent->parent, $link, $separator, $nicename, $visited, $prepend, $append );
        }

        if ( $link )
            $chain .= $prepend.'<a href="' . esc_url( get_category_link( $parent->term_id ) ) . '">'.$name.'</a>' . $append . $separator;
        else
            $chain .= $name.$separator;
        return $chain;
    }

