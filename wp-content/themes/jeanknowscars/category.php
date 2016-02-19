<?php

/**
 * The template for displaying pages
 * @package Jean_Knows_Cars
 */

get_header(); 
?>
<?php
wp_enqueue_style( 'lay-one-column', get_template_directory_uri() . '/assets/css/lay-one-column.css',null,null,"screen" );
wp_enqueue_style( 'mod-breadcrumbs', get_template_directory_uri() . '/assets/css/mod-breadcrumbs.css',null,null,"screen" );
wp_enqueue_style( 'mod-ad-top', get_template_directory_uri() . '/assets/css/mod-ad-top.css',null,null,"screen" );
wp_enqueue_style( 'mod-flipper', get_template_directory_uri() . '/assets/css/mod-flipper.css',null,null,"screen" );
wp_enqueue_style( 'mod-life-with-jean', get_template_directory_uri() . '/assets/css/mod-life-with-jean.css',null,null,"screen" );
wp_enqueue_style( 'mod-car-confession', get_template_directory_uri() . '/assets/css/mod-car-confession.css',null,null,"screen" );
wp_enqueue_style( 'mod-list-item', get_template_directory_uri() . '/assets/css/mod-list-item.css',null,null,"screen" );
wp_enqueue_style( 'mod-load-more', get_template_directory_uri() . '/assets/css/mod-load-more.css',null,null,"screen" );
wp_enqueue_style( 'mod-sort-by-category', get_template_directory_uri() . '/assets/css/mod-sort-by-category.css',null,null,"screen" );
wp_enqueue_style( 'mod-title', get_template_directory_uri() . '/assets/css/mod-title.css',null,null,"screen" );
wp_enqueue_style( 'grid', get_template_directory_uri() . '/assets/css/grid.css',null,null,"screen" );
wp_enqueue_script( 'jquery11', 'http://code.jquery.com/jquery-1.11.0.min.js',null,null,true); 
wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.js',null,null,true); 
wp_enqueue_script( 'mod-ad-header', get_template_directory_uri() . '/assets/js/mod-ad-header.js',null,null,true); 
wp_enqueue_script( 'typekit', 'http://use.typekit.net/hcl6hob.js',null,null,true); 
wp_enqueue_script( 'jquery-cookie', get_template_directory_uri() . '/assets/js/jquery.cookie.min.js',null,null,true); 
wp_enqueue_script( 'plugins', get_template_directory_uri() . '/assets/js/plugins.js',null,null,true); 
wp_enqueue_script( 'jquery.flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider-min.js',null,null,true);
wp_enqueue_script( 'mod-load-more', get_template_directory_uri() . '/assets/js/mod-load-more.js',null,null,true); 

?>
<div class="content-top-wrap">
	<div class="row">
		<?php get_template_part('template-parts/navigation','breadcrumb'); ?> 	</div>
		<div class="mod-title">
			<h1 class="pagetitle" itemprop="name"><?php printf(single_cat_title( '', false ));?></h1>
			<div class="desc"><?php $term_description = term_description(); printf($term_description); ?></div>
		</div> 
	</div>
</div>

<div class="feature-wrap">
    <div class="row">                                    
        <!--Flipper-->
        <?php
            if (class_exists( 'Flipper' ) && shortcode_exists( 'flipper' ))                    
            echo do_shortcode( '[flipper name="home-flipper"]' ) 
        ?>                                  
            <!-- life-with-jean -->  
		<div class="feature-right-wrap right col-18">
             <?php echo do_shortcode( '[add_block name="life-with-jean"]' ) ?>
		</div>
    </div>
</div>
 
<div class="ad-top-wrap">
    <div class="row row-padding">                
         <!-- GPT-top-add -->                 
         <?php echo do_shortcode( '[gpt_add_block name="gpt-top-ad"]' ) ?>               
        <!-- Car-Confessions -->                 
         <?php echo do_shortcode( '[add_block name="car-confessions"]' ) ?>                 
    </div>
</div>

<?php

    if (is_category()) {
		$this_category = get_category($cat);
    }
    $category_link = get_category_link( $cat );
    if($this_category->category_parent){
		$this_category = wp_list_categories('orderby=id&show_count=0&title_li=&use_desc_for_title=1&child_of='.$this_category->category_parent.
    "&echo=0"); 
	}else{
    $this_category = wp_list_categories('orderby=id&depth=1&show_count=0&title_li=&use_desc_for_title=1&child_of='.$this_category->cat_ID.
    "&echo=0");
	}

	$categories = get_the_category( $cat);
$strCategoryName = $categories[0]->cat_name;

?>
<div class="row row-padding">
	<div class="main-column">
	    <?php if ($this_category) { ?> 
			<div class="mod-sort-by-category">
				<h3>Sort by Category</h3>
				<ul class="clearfix">
					<li><a href="<?php $category_link;?>"><span> View All</span></a></li>
					<?php  print_r($this_category); ?>
				</ul>	
			</div>    
		<?php }  
		?>
		<div class="mod-list-item-wrap">
			<div class="load-more-well clearfix">
			<?php
		//total posts
		$args = array( 'cat' => $cat ,'order'   => 'DESC' , 'posts_per_page' =>'-1');
		// The Query
		$totalpostQuery = new WP_Query( $args );
		$count = $totalpostQuery->post_count; 
		
		//total posts
		$args = array( 'cat' => $cat ,'order'   => 'DESC' , 'posts_per_page' =>'9');
		// The Query
		$the_query = new WP_Query( $args );
		
		//echo "Total Posts:".$count;
		if ( $the_query->have_posts() ) {
			$i = 0;
			while ( $the_query->have_posts() ) { 
				
				if($post->ID == the_ID){
					continue;
				}
				$the_query->the_post();
				$strFromatedtitleforReleatedArticle = get_the_title();
				$intStringLength = 30;
				$formatedC = substr($strFromatedtitleforReleatedArticle, 0, 25 );
				?>
					<div class="mod-list-item left col-18 <?php if($i % 3 == 0 ){ echo "first-col"; } ?>">
					<div class="row">
						<div class="img-wrap">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php
									if ( has_post_thumbnail() ) {
										the_post_thumbnail($the_query->post->ID ,'thumbnail');
									} 
								?>
							</a>
						</div>
						<div class="category">
							<a href="<?php  get_category_link( $intCategoryId ); ?>"><?php echo $strCategoryName; ?></a>
						</div>
						<div class="info-wrap">
							<h4 class="title-wrap"><a class="list-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
												<div class="desc"><?php the_excerpt(); ?></div>
						</div>
					</div>
				</div>
				<?php	
		$i++;		
			}
		wp_reset_postdata(); 
		} else {
			echo "no posts found";
		}

		?>	
</div>
        </div>	
		
        <div class="mod-load-more" data-current-page-id="1" data-last-page-id="17" data-route="http://www.jeanknowscars.com/jeans-driveway/" data-lazy-count="0" data-show-count="0" data-replace-state="0" data-page="jeans-driveway">
            <a class="button btn-main-cta" href="http://www.jeanknowscars.com/jeans-driveway/page-2/" title="Load more">
            <span class="btn-text">Load more</span>
            <i class="fa fa-refresh fa-spin"></i>
        </a>
        </div>
            </div>
        </div>

<?php get_footer(); ?>
