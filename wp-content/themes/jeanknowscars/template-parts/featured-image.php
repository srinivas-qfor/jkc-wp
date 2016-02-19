<?php
/**
 * Partial: featured hero for articles
 *
 * @package JeanKnowsCars
 */

 ?>
 
 <?php 
 if ( has_post_thumbnail( $post->ID ) ) :
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
	$featured_alt = get_post_meta(
		get_post_thumbnail_id( $post->ID ),
		'_wp_attachment_image_alt', true ) ? : get_the_title();
    $image = $image[0]; ?>
<div class="mod-main-img" itemprop="associatedMedia" itemscope="" itemtype="http://schema.org/ImageObject">
		<img class="main-img img" itemprop="contentUrl" src="<?php echo $image;?>" alt="<?php echo $featured_alt; ?>">													
</div>
<?php
else :
    echo '<div class="mod-main-img" itemprop="associatedMedia" itemscope="" itemtype="http://schema.org/ImageObject"></div>';
endif;
?>
