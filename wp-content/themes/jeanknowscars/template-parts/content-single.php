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
wp_enqueue_style( 'mod-stay-connected', get_template_directory_uri() . '/assets/css/mod-stay-connected.css',null,null,"screen" );
wp_enqueue_style( 'mod-car-confession', get_template_directory_uri() . '/assets/css/mod-car-confession.css',null,null,"screen" );
wp_enqueue_style( 'mod-related-car-guide', get_template_directory_uri() . '/assets/css/mod-related-car-guide.css',null,null,"screen" );

wp_enqueue_script( 'typeit', '//use.typekit.net/hcl6hob.js',null,null,true);
wp_enqueue_script( 'mod-get-instagram', get_template_directory_uri() . '/assets/js/mod-get-instagram.js',null,null,true);
wp_enqueue_script( 'addthis_init', get_template_directory_uri() . '/assets/js/addthis_init.js',null,null,true);
wp_enqueue_script( 'addthis_close', get_template_directory_uri() . '/assets/js/addthis_close.js"',null,null,true);

get_header(); 
global $post;
$noByline = array(226083);

$slugs = explode('/', get_query_var('category_name'));
$currentCategory = get_category_by_slug('/'.end($slugs));

$categories = get_the_category();
$catpost_name = $categories[0]->name;

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
	
	<?php 
	if(($currentCategory->category_parent != 119) && ($currentCategory->cat_ID != 119)){
	?>
	<div class="mod-related-articles">
        <?php get_template_part('template-parts/related');  ?>
    </div>
    <?php
    }
    ?>

	<div class="facebook-comment">
		<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
	</div>
</div>
<!-- sidebar -->
	<?php 
	if(($currentCategory->category_parent == 119) ||($currentCategory->cat_ID == 119)) {
	?>	

		<div class="right-column right col-18">
		<div class="mod-car-confession clearfix">
                <div class="wrap">
                <h3>Car Confessions</h3>
                <h4>A Pretty Place for Ugly Secrets</h4>
                <a class="btn-alt-cta" href="/confessions/">Confess Here</a>
                </div>
            </div>
		
		<?php echo do_shortcode( '[gpt_add_block name="gpt-mrec-ad-dyn" data-ads="2"]') ?>
<!-- related -->
<?php        
				$single_id = $post->ID;
				$cat_name = $currentCategory->name;
				if($cat_name== "Ultimate Car Guide"){
					$cat_name = $catpost_name;
					$args = array( 'category_name' => $cat_name ,
				'order'   => 'DESC' , 
				'posts_per_page' =>'5',
				'post__not_in' =>array($single_id));
					
				}else{

				$args = array( 'category_name' => $cat_name ,
				'order'   => 'DESC' , 
				'posts_per_page' =>'5',
				'post__not_in' =>array($single_id));

				}

				$the_query = new WP_Query( $args );
				
				?>
			<div class="mod-related-car-guide">
				<h3>More <?php echo $cat_name;?></h3>

		 <?php 
			if ( $the_query->have_posts() ) {
				$i = 0;
				while ( $the_query->have_posts() ) { 
				$the_query->the_post();
				?>
                <div class="row">
                    <div class="img-wrap left col-13">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php
                                if (class_exists('MultiPostThumbnails')){ 

                                if(MultiPostThumbnails::get_the_post_thumbnail('post', 'home-image', NULL, 'full', NULL, false) == ''){?>
                                    <img src="<?php bloginfo('template_directory'); ?>/assets/img/jkc-no-image-288x140.jpg" alt="<?php the_title(); ?>" draggable="false">
                                    <?php 
                                }else{

                                 MultiPostThumbnails::the_post_thumbnail('post', 'home-image', NULL, 'full', NULL, false);   
                                }
                                
                                }
                                else { ?>

                                <img src="<?php bloginfo('template_directory'); ?>/assets/img/jkc-no-image-288x140.jpg" alt="<?php the_title(); ?>" draggable="false">
                                <?php }
                                ?>
                                </a>
                    </div>
                    <div class="info-wrap right col-14">
                        <?php 
                            $strFromatedtitleforReleatedArticle = get_the_title();
                            $strlen = strlen($strFromatedtitleforReleatedArticle);
                            if($strlen >= 45){
                            $formatedC = substr($strFromatedtitleforReleatedArticle, 0, 45 ).'...'; 
                            }else{
                            $formatedC = $strFromatedtitleforReleatedArticle;
                            }
                        ?>
                        <h4 class="title-wrap"><a class="list-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo $formatedC; ?></a></h4>
                        
                    </div>

                </div>
            
        <?php   
$i++; 
        }     
   
}
			?>
				
			</div>
		<!-- related -->

		 <?php echo do_shortcode( '[stay_connected]' ) ?>
		<?php echo do_shortcode( '[gpt_add_block name="gpt-mrec-ad-dyn" data-ads="3"]') ?>
		</div>

	<?php 
	}else{
	?>
		<div class="right-column right col-18">
		<?php echo do_shortcode( '[add_block name="life-with-jean"]' ) ?>
		<?php echo do_shortcode( '[gpt_add_block name="gpt-mrec-ad-dyn" data-ads="2"]') ?>
		<?php echo do_shortcode( '[social_widget]' ) ?>
		<?php echo do_shortcode( '[gpt_add_block name="gpt-mrec-ad-dyn" data-ads="3"]') ?>
		</div>

	<?php
		}
	?>
</div>	

<?php get_footer(); ?>