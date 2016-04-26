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
<div class="content-top-wrap">
	<div class="row">
		<?php get_template_part('template-parts/navigation','breadcrumb'); ?> 	
		<div class="mod-title">
			<h1 class="pagetitle" itemprop="name"> <?php  printf(single_cat_title( '', false ));  ?></h1>
			<div class="desc"><?php $term_description = term_description(); echo strip_tags($term_description); ?></div>
		</div> 
	</div>
</div>
<div class='row'>
	<div class="main-column left col-17">
		<div class="mod-contact" xmlns="http://www.w3.org/1999/html">
			<?php echo $posts[0]->post_content; ?>
			 <div class="contact-form">
			<?php echo do_shortcode(' [contact-form-7 id="747754" title="Contact JeanKnowsCars.com"] ')?>
			</div>
		</div></div>
		</div>
	</div>
	<div class="right-column right col-18">
         <?php echo do_shortcode( '[add_block name="car-confessions" ad_col_wrap="off"]' ) ?>    
         <?php echo do_shortcode( '[add_block name="stay-conntected"]' ) ?>	</div>
	</div>
</div>
<?php get_footer(); ?>