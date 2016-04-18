<?php
/**
 * The template for displaying all single posts and attachments
 */

wp_enqueue_style( 'font-awesome', 'http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css',null,null,"screen" );
wp_enqueue_style( 'mod-article-mobile', get_template_directory_uri() . '/assets/css/mod-article-mobile.css',null,null,"screen" );
wp_enqueue_style( 'mod-related-mobile', get_template_directory_uri() . '/assets/css/mod-related-mobile.css',null,null,"screen" );

wp_enqueue_script( 'typeit', '//use.typekit.net/hcl6hob.js',null,null,true);
wp_enqueue_script( 'addthis_init', get_template_directory_uri() . '/assets/js/addthis_init.js',null,null,true);
wp_enqueue_script( 'addthis_close', get_template_directory_uri() . '/assets/js/addthis_close.js"',null,null,true);

get_header(); 
global $post;
$noByline = array(226083);

$slugs = explode('/', get_query_var('category_name'));
$currentCategory = get_category_by_slug('/'.end($slugs));
?>

<div class="mod-article-mobile article-detail" data-omnituremodule="{&quot;name&quot;: &quot;Mod: Article&quot;, &quot;id&quot;: &quot;Mod062&quot;}">
	<div class="article-head">
		<h1 class="page-title" itemprop="name"><?php the_title(); ?></h1>
		<h2 class="subtitle"><?php echo get_post_meta($post->ID, 'subTitle', true);  ?></h2>
		<div class="info clearfix">
                    <?php if( get_the_author() == 'admin' ){ ?>
                        <span class="timestamp"><?php the_date(); ?></span>
                    <?php } else{ ?>
                        <span class="timestamp"><?php the_date(); ?></span>
                        <span class="separator-date-author">- by</span>
                        <span class="author" itemprop="creator author" itemscope="" itemtype="http://schema.org/Person">
                                <span itemprop="name"><?php the_author(); ?></span>
                        </span>
                    <?php } ?>
                        <div class="social right">
                                <span class="share-btn left">Share</span>
                                <div class="mod-addthis-hover">
                                        <div class="addthis_toolbox"></div>
                                </div>
                        </div>
		</div>
		<?php get_template_part('template-parts/featured-image');  ?>
	</div>
	<div class="main-content" itemprop="articleBody">
		<?php the_content(); ?>
	</div>

	<?php
        
	$arrDefalutUploadURL = wp_upload_dir();
	$strDefaultUploadBaseURL = $arrDefalutUploadURL['baseurl'];
	$arrAttachedImages = get_post_meta($post->ID,'galleryImages');
    $arr4Images = '';
	if(count($arrAttachedImages[0]) > 4) {
		$arr4Images = array_slice($arrAttachedImages[0],0,4);
    }else{
		$arr4Images = $arrAttachedImages[0];
    }					
	?>
	<div class="mod-article-photos-mobile" data-simparent="">
		<ul class="clearfix">
			<?php 
			foreach( $arr4Images as $key=>$strAttachedImage){
				$arrAttachedImageDetails  ='';
				$arrAttachedImagePostDetails = '';
				$arrAttachedImageDetails = wp_get_attachment_metadata($strAttachedImage);
				$arrAttachedImagePostDetails = get_post($strAttachedImage);
				$strImageURL = '';
				$strImageURL = $strDefaultUploadBaseURL."/".$arrAttachedImageDetails['file'];
				?>
						 
                         <?php if($currentCategory->category_parent == 119 && $key == 3 ) { ?>
                            <li class="guide-photos-image-all">
                                <a title="See All Photos of the <?php echo $arrAttachedImagePostDetails->post_title; ?> - JeanKnowsCars.com" href="<?php the_permalink(); ?>photo-01.html">See All Photos</a>
                            </li>
                         <?php } else { ?>
                            <li>
				<a href="<?php the_permalink(); ?>photo-0<?php echo $key+2; ?>.html" title="<?php echo $arrAttachedImagePostDetails->post_title; ?>">
					<img src="<?php echo $strImageURL;?>" alt="<?php echo $arrAttachedImagePostDetails->post_title; ?>" height="200" width="320"/>
					<span><?php echo $arrAttachedImagePostDetails->post_title; ?></span>
				</a>
			</li>
                         <?php } ?>
			<?php } ?>
		</ul>
		<?php if(count($arrAttachedImages[0]) > 4 && $currentCategory->category_parent != 119 ) { ?>
		<a href="<?php the_permalink(); ?>photo-01.html" title="See All Photos of the <?php ?> - JeanKnowsCars.com" class="btn-see-photos">See All Photos</a>
		<?php } ?>
	</div>

	<div class="facebook-comment">
		<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
	</div>

	<?php echo do_shortcode('[gpt_add_block name="gpt-mrec-ad-mobile-dyn" data-ads="2" cont-class=""]'); ?>

	<div class="mod-related-articles-mobile">
		<?php get_template_part('template-parts/related');  ?>
	</div>

	<?php echo do_shortcode('[gpt_add_block name="gpt-mrec-ad-mobile-dyn" data-ads="4" cont-class=""]'); ?>
</div>

<?php get_footer(); ?>