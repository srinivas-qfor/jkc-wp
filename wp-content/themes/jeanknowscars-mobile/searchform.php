<?php
/**
 * Template for displaying search forms 
 *
 * @package JKC
 */
?>
<div class="search-cont">
    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/search/' ) ); ?>">
            <input class="search" id='jkc_searchfield' type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Type your search here...', 'placeholder', 'twentysixteen' ); ?>" value="<?php echo get_search_query(); ?>" name="q" title="<?php echo esc_attr_x( 'Search for:', 'label', '' ); ?>" />
            <button class="search-button search-btn search-submit" tabindex="1" onclick="return checkmeNotEmpty();" style="border:none;"><i class="fa fa-search"></i></button>
    </form>
</div>