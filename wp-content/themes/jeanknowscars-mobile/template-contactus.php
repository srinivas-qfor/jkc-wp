<?php
	/*
	* Template Name: Contact Us 
	* @package Jean_Knows_Cars
	*/
?>
<?php get_header(); 
?>

<?php 
	wp_enqueue_style( 'lay-two-column', get_template_directory_uri() . '/assets/css/lay-two-column.css' );
	wp_enqueue_style( 'mod-breadcrumbs', get_template_directory_uri() . '/assets/css/mod-breadcrumbs.css' );
	wp_enqueue_style( 'mod-car-confession', get_template_directory_uri() . '/assets/css/mod-car-confession.css' );
	wp_enqueue_style( 'mod-stay-connected', get_template_directory_uri() . '/assets/css/mod-stay-connected.css' );
	wp_enqueue_style( 'mod-contact', get_template_directory_uri() . '/assets/css/mod-contact.css' );
	//wp_enqueue_script( 'mod-contact', get_template_directory_uri() . '/assets/js/mod-contact.js',null,null,true);
?>
		<div class="mod-contact" xmlns="http://www.w3.org/1999/html">
			<?php echo $posts[0]->post_content; ?>
			 <div class="contact-form">
			<?php echo do_shortcode(' [contact-form-7 id="747270" title="Contact JeanKnowsCars.com"] ')?>
			</div>
		</div></div>
		</div>
	
<?php get_footer(); ?>