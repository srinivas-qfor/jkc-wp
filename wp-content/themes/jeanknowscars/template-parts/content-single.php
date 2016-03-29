<?php
/**
 * The template for displaying all single posts and attachments
 */

wp_enqueue_style( 'lay-one-column', get_template_directory_uri() . '/assets/css/lay-two-column.css',null,null,"screen" );
wp_enqueue_style( 'font-awesome', 'http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css',null,null,"screen" );
wp_enqueue_style( 'reset', get_template_directory_uri() . '/assets/css/reset.css',null,null,"screen" );
wp_enqueue_style( 'grid', get_template_directory_uri() . '/assets/css/grid.css',null,null,"screen" );
wp_enqueue_style( 'global', get_template_directory_uri() . '/assets/css/global.css',null,null,"screen" );
wp_enqueue_style( 'mod-footer', get_template_directory_uri() . '/assets/css/mod-footer.css',null,null,"screen" );
wp_enqueue_style( 'mod-header', get_template_directory_uri() . '/assets/css/mod-header.css',null,null,"screen" );
wp_enqueue_style( 'mod-breadcrumbs', get_template_directory_uri() . '/assets/css/mod-breadcrumbs.css',null,null,"screen" );
wp_enqueue_style( 'mod-ad-mrec', get_template_directory_uri() . '/assets/css/mod-ad-mrec.css',null,null,"screen" );
wp_enqueue_style( 'mod-life-with-jean', get_template_directory_uri() . '/assets/css/mod-life-with-jean.css',null,null,"screen" );
wp_enqueue_style( 'mod-get-social', get_template_directory_uri() . '/assets/css/mod-get-social.css',null,null,"screen" );
wp_enqueue_style( 'mod-article', get_template_directory_uri() . '/assets/css/mod-article.css',null,null,"screen" );
wp_enqueue_style( 'mod-related', get_template_directory_uri() . '/assets/css/mod-related.css',null,null,"screen" );
wp_enqueue_style( 'mod-facebook-comment', get_template_directory_uri() . '/assets/css/mod-facebook-comment.css',null,null,"screen" );

wp_enqueue_script( 'typeit', '//use.typekit.net/hcl6hob.js',null,null,true);
wp_enqueue_script( 'mod-get-instagram', get_template_directory_uri() . '/assets/js/mod-get-instagram.js',null,null,true);
wp_enqueue_script( 'addthis_init', get_template_directory_uri() . '/assets/js/addthis_init.js',null,null,true);
wp_enqueue_script( 'addthis_close', get_template_directory_uri() . '/assets/js/addthis_close.js"',null,null,true);

get_header(); 
?>

<!--Breadcrumb-->
<div class="content-top-wrap">
    <div class="row">
            <!--Navigation-Links-->
            <?php get_template_part('template-parts/navigation','breadcrumb'); ?>     
    </div>
</div>
<div class="row">
	<div class="main-column left col-17" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="mod-article article-detail" data-omnituremodule="">
			<div class="article-head">
				<h1 class="page-title" itemprop="name"><?php the_title(); ?></h1>
                    <h2 class="subtitle"><?php echo get_post_meta($post->ID, 'subTitle', true);  ?></h2>
					<div class="info clearfix">
						<span class="timestamp"><?php the_date(); ?></span>
                        <span class="separator-date-author">- by</span>
						<span class="author" itemprop="creator author" itemscope="" itemtype="http://schema.org/Person">
							<span itemprop="name"><?php the_author(); ?></span>
						</span>
                        <div class="social right">
							<span class="share-btn left">Share</span>
							<div class="mod-addthis-hover">
								<div class="addthis_toolbox"></div>
							</div>
						</div>
						<?php get_template_part('template-parts/featured-image');  ?>
					</div>
					<div class="main-content" itemprop="articleBody">
					<?php the_content(); ?>
					</div>    
			</div>
	</div>
	
	<div class="mod-article-photos" data-simparent>
	<?php
        
	$arrDefalutUploadURL = wp_upload_dir();
	$strDefaultUploadBaseURL = $arrDefalutUploadURL['baseurl'];
	$arrAttachedImages = get_post_meta($post->ID,'galleryImages');
        $arr4Images = '';
	if(count($arrAttachedImages[0]) > 4) {
		$arr4Images =  array_slice($arrAttachedImages[0],0,4);
        }else{
             $arr4Images = $arrAttachedImages[0];
        }
					
	?>
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
			 <li>
				<a href="<?php the_permalink(); ?>photo-0<?php echo $key+2; ?>.html" title="<?php echo $arrAttachedImagePostDetails->post_title; ?>">
					<img src="<?php echo $strImageURL;?>" alt="<?php echo $arrAttachedImagePostDetails->post_title; ?>" height="200" width="320"/>
					<span><?php echo $arrAttachedImagePostDetails->post_title; ?></span>
				</a>
			</li>
			<?php } ?>
		</ul>
		<?php if(count($arrAttachedImages[0]) > 4) { ?>
		<a href="<?php the_permalink(); ?>photo-01.html" title="See All Photos of the <?php ?> - JeanKnowsCars.com" class="btn-see-photos">See All Photos</a>
		<?php } ?>
	</div>
	
	<div class="mod-related-articles">
        <?php get_template_part('template-parts/related');  ?>
    </div>
	<div class="facebook-comment">
		<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
	</div>
</div>
	<div class="right-column right col-18">
		<?php echo do_shortcode( '[add_block name="life-with-jean"]' ) ?>
		<?php echo do_shortcode( '[gpt_add_block name="gpt-mrec-ad-dyn" data-ads="2"]') ?>
		<?php echo do_shortcode( '[social_widget]' ) ?>
		<?php echo do_shortcode( '[gpt_add_block name="gpt-mrec-ad-dyn" data-ads="3"]') ?>
	</div>
</div>	

<?php get_footer(); ?>