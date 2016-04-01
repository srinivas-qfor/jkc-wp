<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

		while ( have_posts() ) : the_post();
                        
                         $pattern = '/photo-(.*?).html/';
			preg_match($pattern,$_SERVER['REQUEST_URI'],$matches);
			// Include the single post content template.
			if($matches){
				get_template_part( 'template-parts/content', 'gallery' );
			}else{
				get_template_part( 'template-parts/content', 'single' );
			}
			// End of the loop.
		endwhile;
?>
