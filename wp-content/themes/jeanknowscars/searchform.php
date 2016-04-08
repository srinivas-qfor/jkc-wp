<?php
/**
 * Template for displaying search forms in Twenty Sixteen
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<div class="search-cont">
    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input class="search" id='jkc_searchfield'type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Type your search here...', 'placeholder', 'twentysixteen' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'twentysixteen' ); ?>" />
            <button class="search-button search-btn search-submit" tabindex="1" style="border:none;" onclick="return checkmeNotEmpty();"><i class="fa fa-search"></i></button>
    </form>
</div>
