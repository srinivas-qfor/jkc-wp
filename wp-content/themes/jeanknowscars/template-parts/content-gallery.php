<?php
/*
 * Template Name: Gallery Page Template
 * Description: Page template for gallery to display
 */

get_header();
# Loading CSS for front page
wp_enqueue_style( 'lay-two-column', get_template_directory_uri() . '/assets/css/lay-two-column.css',null,null,"screen" );
wp_enqueue_style( 'mod-breadcrumbs', get_template_directory_uri() . '/assets/css/mod-breadcrumbs.css',null,null,"screen" );
wp_enqueue_style( 'mod-car-confession', get_template_directory_uri() . '/assets/css/mod-car-confession.css',null,null,"screen" );
wp_enqueue_style( 'mod-stay-connected', get_template_directory_uri() . '/assets/css/mod-stay-connected.css',null,null,"screen" );

wp_enqueue_script( 'mod-gallery', get_template_directory_uri() . '/assets/js/mod-gallery.js"',null,null,true);
wp_enqueue_script( 'addthis_init', get_template_directory_uri() . '/assets/js/addthis_init.js',null,null,true);
wp_enqueue_script( 'addthis_close', get_template_directory_uri() . '/assets/js/addthis_close.js"',null,null,true);
?>

<div class="content-top-wrap">
	<div class="row">
		<?php get_template_part('template-parts/navigation','breadcrumb'); ?> 	
		<div class="mod-title">
			<h1 class="pagetitle" itemprop="name"><?php printf(single_cat_title( '', false ));?></h1>
			<div class="desc"><?php $term_description = term_description(); echo strip_tags($term_description); ?></div>
		</div> 
	</div>
</div>

<div class="row">
	<div class="main-column left col-17">
		
        <div class="mod-gallery full-gallery">
			<div class="mod-photo-overlay hide">
				<div class="gallery-wrap row">
					<span class="close-btn" data-s-object-id="PhotoGallery:MainImage:Close"></span>
					<div class="clearfix content-wrap large-slide">
						<img src="<?php echo bloginfo('template_url'); ?>/assets/img/loading.gif" alt="" />
						<div class="content clearfix">
							<div class="caption left"></div>
							<a href="#" class="download right">View Full Size Image</a>
						</div>
					</div>
				</div>
			</div>
			<h1 class="page-title" itemprop="name"><?php echo $post->post_title; ?> Photo Gallery</h1>
			<div class="info clearfix">
				<div class="back-to-article left"><a href="<?php the_permalink(); ?>">Return to Article</a></div>
				<div class="social right">
					<span class="share-btn left">Share</span>
					<div class="mod-addthis-hover">
						<div class="addthis_toolbox" >
							<span class="addthis-share left">Share</span>
						</div>
					</div>
				</div>
			</div>
            <div class="pg-wrapper">
                <div class="pg-overlay">
				<?php 	
					$strDefaultUploadBaseURL = '';
					$strDefaultUploadBaseURL= '';
					$arrAttachedImages = '';
					$pattern = '/photo-(.*?).html/';
					preg_match($pattern,$_SERVER['REQUEST_URI'],$matchs);
					$arrDefalutUploadURL = wp_upload_dir();
					$strDefaultUploadBaseURL = $arrDefalutUploadURL['baseurl'];
					$arrAttachedImages = get_post_meta($post->ID,'galleryImages');			
					$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
					$arrMainImageArray = array($post_thumbnail_id);
					$newarray = array_merge($arrMainImageArray, $arrAttachedImages[0]);
					foreach( $newarray as $key=>$strAttachedImage){
						$arrAttachedImageDetails = wp_get_attachment_metadata($strAttachedImage);
						$arrAttachedImagePostDetails = get_post($strAttachedImage);
						$strImageURL = $strDefaultUploadBaseURL."/".$arrAttachedImageDetails['file'];
						$a = '';
						if( ($key + 1 ) == ( $matchs[1] )){
							$a = 'current';
						}						
						?>
						<div id="" class="large-slide-<?php echo ($key+1); ?> large-slide <?php echo $a; ?>" data-count="<?php echo ($key + 1 ); ?>" data-overlay="<?php echo $strImageURL; ?>" data-full-size="<?php echo $strImageURL; ?> ">
							<div itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
								<span class="zoom-gallery" data-overlay="<?php echo $strImageURL; ?> " data-caption="<?php  echo $arrAttachedImagePostDetails->post_title; ?>" data-href="<?php echo $strImageURL; ?> "></span>
								<img itemprop="contentUrl" src="<?php echo $strImageURL; ?> " alt="<?php echo $arrAttachedImagePostDetails->post_title; ?>" onerror="this.src='/img/noimage.jpg'" />
								<meta itemprop="height" content="auto" />
								<meta itemprop="width" content="640" />
								<span itemprop="caption" class="hide"><?php echo $arrAttachedImagePostDetails->post_title; ?></span>
							</div>
							<span class="full-size" data-fullsize="<?php echo $strImageURL; ?> "><?php echo $arrAttachedImagePostDetails->post_title; ?></span>
							<div class="large-title"><?php echo trim($arrAttachedImagePostDetails->post_title); ?></div>
						</div>
						<?php 
					}
				?>
					<div class="large-slide-arrow next"></div>
					<div class="large-slide-arrow prev"></div>
				</div> 
				
				<div class="pg-control">
					<div class="flow clearfix">
						<?php 
						foreach( $newarray as $key=>$strAttachedImage){
						$a = '';
						if(($key + 1) == $matchs[1]){
							$a = 'current';
						}
						$arrAttachedImageDetails = '';
						$arrAttachedImageDetails = wp_get_attachment_metadata($strAttachedImage);
						$arrAttachedImagePostDetails = '';
						$arrAttachedImagePostDetails = get_post($strAttachedImage);
						$largeBattern = '/-large_/';
						$smallerBatter = '/-small_/';
						$matches = '';
						if(preg_match($largeBattern,$arrAttachedImageDetails['file'],$matches)){
							//replace large with small
							if($matches){
								$strSmallImageName = '';
								$strSmallImageNameURL = '';
								$strUploadPaths = '';
								$strSmallImagePath = '';
								$strSmallImageName = str_replace('-large_','-small_',$arrAttachedImageDetails['file']);
								$strSmallImageNameURL = $strDefaultUploadBaseURL.'/'.$strSmallImageName;
								$strSmallImagePath = $arrDefalutUploadURL['path'].'/'.$strSmallImageName;
								if( file_exists( $strSmallImagePath ) ) {
									$strImageURL = $strSmallImageNameURL;
								}else{
									$strImageURL = $strDefaultUploadBaseURL."/".$arrAttachedImageDetails['file'];
								}
							}
						}else{
                                                  $arrImageURLDetails = wp_get_attachment_image_src ( $strAttachedImage, 'gallerypage-thumb');
                                                  $strImageURL = $arrImageURLDetails[0];
						}
						?>
						 <div id="" class="img-item left thumbnail-<?php echo ( $key+1) ;?> thumbnail-item <?php echo $a; ?>">
							<a class="thumbnail-link" href="<?php echo $strImageURL; ?>" title="<?php echo $arrAttachedImagePostDetails->post_title;?>" data-count="<?php echo ( $key+1 ); ?>">
								<img src="<?php echo $strImageURL; ?>" alt="<?php echo $arrAttachedImagePostDetails->post_title; ?>" width="160" height="100" onerror="this.src='<?php bloginfo('template_url'); ?>/assets/img/noimage.jpg'"/>
							</a>
						</div>
						<?php } ?>			
					</div>
				</div>
			
			</div>
		</div>
	</div>
	<div class="right-column right col-18">
		<?php echo do_shortcode('[add_block name="car-confessions" ad_col_wrap="off"]') ?>
		<?php echo do_shortcode( '[add_block name="stay-conntected"]' ) ?>		
	</div>
</div>
<?php get_footer(); 
?>	
