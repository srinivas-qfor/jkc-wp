<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<?php

$adBlock = 2;
$pageNum = (int)get_query_var('paged', 0);
if($pageNum >= 2 && $pageNum <= 6) {
	$adBlock = $pageNum + 1;
	//echo $adBlock; exit;
}

if (is_category()) {
	$this_category = get_category($cat);
}
?>

<div class="content-top-wrap">
	<div class="row">
		<?php get_template_part('template-parts/navigation','breadcrumb'); ?> 	
		<div class="mod-title">
			<h1 class="pagetitle" itemprop="name">
				<?php 
					if( $cat == '126') {
						 echo "What's in Jean's Driveway";
					}else{
					  printf(single_cat_title( '', false )); 
					} 
				?></h1>
			<div class="desc"><?php $term_description = term_description(); echo strip_tags($term_description); ?></div>
		</div> 
	</div>
</div>

<!-- -->
<div class="feature-wrap">
    <div class="row">                                    
        <!--Flipper-->
        <?php
            if (class_exists( 'Flipper' ) && shortcode_exists( 'flipper' ))                    
            echo do_shortcode( '[flipper name="home-flipper" cat="'.$this_category->cat_ID.'"]' ) 
        ?>                                  
            <!-- life-with-jean -->  
		<div class="feature-right-wrap right col-18">
             <?php echo do_shortcode( '[add_block name="life-with-jean"]' ) ?>
		</div>
    </div>
</div>

 <!-- -->
<div class="ad-top-wrap">
    <div class="row row-padding">                
         <!-- GPT-top-add -->                 
         <?php echo do_shortcode( '[gpt_add_block name="gpt-top-ad"]' ) ?>               
        <!-- Car-Confessions -->                 
         <?php echo do_shortcode( '[add_block name="car-confessions"]' ) ?>                 
    </div>
</div>

<?php
    $category_link = get_category_link( $cat );
    $this_category_has_parent = $this_category->parent;
	if($this_category_has_parent != '0'){
		$category_link = get_category_link($this_category_has_parent);
	}


    if($this_category->category_parent){
		$this_category = wp_list_categories('orderby=date&show_count=0&title_li=&use_desc_for_title=1&child_of='.$this_category->category_parent.
    "&echo=0"); 
	}else{
    $this_category = wp_list_categories('orderby=date&depth=1&show_count=0&title_li=&use_desc_for_title=1&child_of='.$this_category->cat_ID.
    "&echo=0");
	}
?>

<div class="row row-padding">
	<div class="main-column">
			<?php if ($this_category) { ?> 
				  <div class="mod-sort-by-category">
					<h3>Sort by Category</h3>
					<ul class="clearfix">
					<?php 
					if($this_category_has_parent == '0') { ?>
						<li class='current-cat'><a href="<?php echo $category_link;?>"><span> View All</span></a></li>
					<?php }else{ ?>
						<li><a href="<?php echo $category_link;?>"> View All</a></li>
					<?php } ?>					
					<?php print_r($this_category); ?>
					</ul>	
				  </div>    
			<?php }  
			?>

		<div class="mod-list-item-wrap">

			<!--after 7th load if($pageNum > 6)-->
			<?php if($pageNum > 6){ ?>

				<div class="load-more-well clearfix"> 

				<?php

				$slugs = explode('/', get_query_var('category_name'));
				$currentCategory = get_category_by_slug('/'.end($slugs));
				$cat_nam = $currentCategory->name;

				$posts = query_posts(array(
				 'posts_per_page' => '9',
				 'category_name' => $cat_nam,
				 'paged' => $pageNum
				 ));

				if (have_posts()) :
				?>

				<?php
				$i = 0;
				// Start the Loop.
				while (have_posts()) : the_post();
				?>
				<div class="mod-list-item left col-18 <?php if ($i % 3 == 0) {
				echo "first-col";
				} ?>">
				<div class="row">
				<div class="img-wrap">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php
				if (class_exists('MultiPostThumbnails')){ 
				MultiPostThumbnails::the_post_thumbnail('post', 'flipper-image', NULL, 'full', NULL, false);
				}else {  ?>
				<img src="<?php bloginfo('template_directory'); ?>/assets/img/jkc-no-image-288x140.jpg" alt="<?php the_title(); ?>" draggable="false">
				<?php }
				?>
				</a>
				</div>
				<div class="category">
				<?php
				$categories = get_the_category($the_post->ID);
				$intCategoryId = is_array($categories) ? $categories[0]->cat_ID : $categories->cat_ID;
				$category_name = is_array($categories) ? $categories[0]->name : $categories->name;
				?>
				<a href="<?php echo get_category_link( $intCategoryId ); ?>">
				<?=$category_name;?>
				</a>
				</div>
				<div class="info-wrap">
				<?php 
				$strFromatedtitleforReleatedArticle = get_the_title();
				$strlen = strlen($strFromatedtitleforReleatedArticle);

				if($strlen >= 45){
				$formatedC = substr($strFromatedtitleforReleatedArticle, 0, 45 ).'...';	
				}else{
				$formatedC = $strFromatedtitleforReleatedArticle;
				}
				?>

				<h4 class="title-wrap">
				<a class="list-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php echo $formatedC;?>
				</a>
				</h4>
				<div class="desc">
				<?php the_excerpt(); ?>
				</div>
				</div>
				</div>
				</div>
				<?php
				// End the loop.
				$i++;
				endwhile;

				// If no content, include the "No posts found" template.
				else :
				get_template_part('template-parts/content', 'none');

				endif;
				?>

				</div>

				<!--loadmore-->
				<div class="mod-load-more">
				<?php
				// Previous/next page navigation.
				if ( have_posts() ) : 
				the_posts_pagination(array(
				'prev_text' => __('Previous page', 'twentysixteen'),
				'next_text' => __('Next page', 'twentysixteen'),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'twentysixteen') . ' </span>',
				));
				endif;
				//wp_reset_postdata();
				?>
				<a class="button btn-main-cta btn-loading"
				style = "display:none;" href="/" title="Load more">
				<i class="fa fa-refresh fa-spin"></i>
				</a>
				</div>
				<?php 
			}?>


			<?php if($pageNum <= 6){ ?>
			<!--normal load-->
			<div class="load-more-well clearfix"> 
				<?php if ( have_posts() ) : ?>

				<?php
				$i = 0;
				// Start the Loop.
				while ( have_posts() ) : 
				?>
					<div class="mod-list-item left col-18 <?php if($i % 3 == 0 ){ echo "first-col"; } if($i == 5 ){ echo " item-ads"; } ?>">

						<?php 

							if($i == 5){
							
								echo do_shortcode( '[gpt_add_block name="gpt-mrec-ad-dyn" data-ads="'.$adBlock.'"]' );
								
							}
							else{ the_post(); ?>

							<div class="row">
								<div class="img-wrap">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php
							
                                                                if (class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail('post','home-image')){ 
                                                                   MultiPostThumbnails::the_post_thumbnail('post', 'home-image', NULL, 'large', NULL, false);
								} else { ?>
                                                                <img src="<?php bloginfo('template_directory'); ?>/assets/img/jkc-no-image-288x140.jpg" alt="<?php the_title(); ?>" draggable="false">
                                                                 <?php }
								?>
								</a>
								</div>
								<div class="category">
								<?php
								$categories = get_the_category($the_post->ID);
								$intCategoryId = is_array($categories) ? $categories[0]->cat_ID : $categories->cat_ID;
								$category_name = is_array($categories) ? $categories[0]->name : $categories->name;
								?>
								<a href="<?php echo get_category_link( $intCategoryId ); ?>">
								<?=$category_name;?>
								</a>
								</div>
								<div class="info-wrap">
								<?php 
								$strFromatedtitleforReleatedArticle = get_the_title();
								$strlen = strlen($strFromatedtitleforReleatedArticle);

								if($strlen >= 45){
								$formatedC = substr($strFromatedtitleforReleatedArticle, 0, 45 ).'...';	
								}else{
								$formatedC = $strFromatedtitleforReleatedArticle;
								}
								?>

									<h4 class="title-wrap">
									<a class="list-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<?php echo $formatedC;?>
									</a>
									</h4>
								<div class="desc">
								<?php the_excerpt(); ?>
								</div>
								</div>
							</div>
							<?php

							}

						?>

					  					</div>
				<?php

				// End the loop.
				$i++;
				endwhile;
				?>
				<?php 
				// If no content, include the "No posts found" template.
				else :
				get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

			</div>
			<div class="mod-load-more">
			<?php
			// Previous/next page navigation.
			if ( have_posts() ) : 
				the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentysixteen' ),
				'next_text'          => __( 'Next page', 'twentysixteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
				) );
			endif;
			?>
				<a class="button btn-main-cta btn-loading"
                style = "display:none;" href="/" title="Load more">
                <i class="fa fa-refresh fa-spin"></i>
                </a>
			</div>
			<?php } ?>



		</div>
	</div>
</div>



<?php get_footer(); ?>
