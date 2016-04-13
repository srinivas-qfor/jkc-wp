<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>


        <div class="mod-title">
            <h1 class="pagetitle" itemprop="name">Search Results: <?php echo esc_html( get_search_query() ) ?></h1>
        </div>

        <div class="mod-search">
            <div class="search-wrap">
                  <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <input class="input-text" id='jkc_searchfield' type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Type your search here...', 'placeholder', 'twentysixteen' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'twentysixteen' ); ?>" />
                        <button class="search-button search-btn search-submit" onclick="return checkmeNotEmpty();" tabindex="1">
                            <i class="fa fa-search"></i>
                        </button>
                </form>
            </div>
            <div class="results">Showing <?php echo $wp_query->found_posts; ?> Results for <?php echo esc_html( get_search_query() ) ?></div>
        </div>
        <div class="mod-list-search-mobile">
            <div class="load-more-well">
                        <?php
                            if( have_posts() ):
                                while ( have_posts() ) : the_post();
                                        get_template_part( 'template-parts/content', 'search' );
                                endwhile;
                            endif;
                        ?>
           
            </div>
        </div>
            
         <?php 
         the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'twentysixteen' ),
                'next_text'          => __( 'Next page', 'twentysixteen' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
        ) );
         ?>

<?php get_footer(); ?>

  