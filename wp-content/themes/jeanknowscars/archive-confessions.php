<?php

get_header(); 

wp_enqueue_style( 'lay-two-column', get_template_directory_uri() . '/assets/css/lay-two-column.css',null,null,"screen" );
wp_enqueue_style( 'mod-breadcrumbs', get_template_directory_uri() . '/assets/css/mod-breadcrumbs.css',null,null,"screen" );
wp_enqueue_style( 'mod-grid', get_template_directory_uri() . '/assets/css/grid.css',null,null,"screen" );
wp_enqueue_style( 'mod-reset', get_template_directory_uri() . '/assets/css/reset.css',null,null,"screen" );
wp_enqueue_style( 'mod-global', get_template_directory_uri() . '/assets/css/global.css',null,null,"screen" );
wp_enqueue_style( 'mod-footer', get_template_directory_uri() . '/assets/css/mod-footer.css',null,null,"screen" );
wp_enqueue_style( 'mod-header', get_template_directory_uri() . '/assets/css/mod-header.css',null,null,"screen" );
wp_enqueue_style( 'mod-life-with-jean', get_template_directory_uri() . '/assets/css/mod-life-with-jean.css',null,null,"screen" );
wp_enqueue_style( 'mod-car-confession', get_template_directory_uri() . '/assets/css/mod-car-confession.css',null,null,"screen" );
wp_enqueue_style( 'mod-confessions-title', get_template_directory_uri() . '/assets/css/mod-confessions-title.css',null,null,"screen" );
wp_enqueue_style( 'mod-get-social', get_template_directory_uri() . '/assets/css/mod-get-social.css',null,null,"screen" );
wp_enqueue_style( 'mod-load-more', get_template_directory_uri() . '/assets/css/mod-load-more.css',null,null,"screen" );
wp_enqueue_style( 'mod-confessions-form', get_template_directory_uri() . '/assets/css/mod-confessions-form.css',null,null,"screen" );
wp_enqueue_style( 'mod-list-item-confessions', get_template_directory_uri() . '/assets/css/mod-list-item-confessions.css',null,null,"screen" );
wp_enqueue_style( 'mod-filter-confessions-faq', get_template_directory_uri() . '/assets/css/mod-filter-confessions-faq.css',null,null,"screen" );

wp_enqueue_script( 'load', 'http://a.postrelease.com/serve/load.js?async=true',null,null,true); 
wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.js',null,null,true); 
wp_enqueue_script( 'mod-ad-header', get_template_directory_uri() . '/assets/js/mod-ad-header.js',null,null,true); 
wp_enqueue_script( 'typekit', 'http://use.typekit.net/hcl6hob.js',null,null,true); 
wp_enqueue_script( 'jquery-cookie', get_template_directory_uri() . '/assets/js/jquery.cookie.min.js',null,null,true);
wp_enqueue_script( 'global', get_template_directory_uri() . '/assets/js/global.js',null,null,true);
wp_enqueue_script( 'mod-header', get_template_directory_uri() . '/assets/js/mod-header.js',null,null,true); 
wp_enqueue_script( 'mod-get-instagram', get_template_directory_uri() . '/assets/js/mod-get-instagram.js',null,null,true); 
wp_enqueue_script( 'mod-load-more', get_template_directory_uri() . '/assets/js/mod-load-more.js',null,null,true); 
wp_enqueue_script( 'mod-confessions-form', get_template_directory_uri() . '/assets/js/mod-confessions-form.js',null,null,true); 
wp_enqueue_script( 'mod-filter-confessions-faq', get_template_directory_uri() . '/assets/js/mod-filter-confessions-faq.js',null,null,true); 
wp_enqueue_script( 'addthis_init', get_template_directory_uri() . '/assets/js/addthis_init.js',null,null,true); 
wp_enqueue_script( 'addthis_close', get_template_directory_uri() . '/assets/js/addthis_close.js',null,null,true); 
wp_enqueue_script( 'mod-confessions-title', get_template_directory_uri() . '/assets/js/mod-confessions-title.js',null,null,true); 

?>
<style>
.confessions-title-inner .wp-image-746186{ width:100%; }
.confessions-title-inner .test{ margin-top: -250px;position: absolute; }
.mod-confessions-title h1{ margin-left:0 !important; }
</style>
<div class="content-top-wrap">
	<div class="row">
		<?php get_template_part('template-parts/navigation','breadcrumb'); ?> 	
		<div class="mod-title">
			<h1 class="pagetitle" itemprop="name"><?php printf(single_cat_title( '', false ));?></h1>
			<div class="desc"><?php $term_description = term_description(); printf($term_description); ?></div>
		</div> 
	</div>
</div>
<div class="row">
	<div class="main-column left col-17">
	<?php
	$theAJQPage = '';
	$theAJQPage = get_page_by_title( 'Car Confessions', 'ARRAY_A', 'page' );
	?>
	<?php
	if(!empty($theAJQPage['post_content'])){
		echo $theAJQPage['post_content'] ;
	}
	?>
	<div class="mod-confessions-form">
			<div class="auto-login-container hide clearfix">
				<div class="right">
					<div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="false" onlogin="checkLoginState();"></div>
				</div>
				<div class="left auto-login-dont-have">You must login to post a confession!</div>
			</div>
			<div class="post-confession-form hide">
				<h2>Add Your Confession</h2>
				<div class="clearfix">
					<span class="confession-post-remaining">(250 characters remain)</span>
					<textarea id="confession-textarea" class="confession-textarea"></textarea>
					<span class="confession-tag-ctr">
						<label>Tag it!</label>
						<div class="dropdown-custom">
							<select id="tagDropdown" class="confession-tag" title="Select a Tag" style="z-index: 10; opacity: 0;" >
								<option value="Select a Tag">Select a Tag</option>
								<?php 
								$childAJQCategroy = '';
								$childAJQCategroy = get_category_children('231');
								$arrChildAJQCategroy = explode('/',$childAJQCategroy);
								sort($arrChildAJQCategroy);
								foreach ($arrChildAJQCategroy as $intCatId){
									if(empty($intCatId)){
											continue;
									}
									$strCatName = '';
									$strCatName =get_the_category_by_ID($intCatId);
									echo "<option ".$strCatName." ".$strSelectedTag." data-alias=\"/confessions/?tags=".$strCatName."\" value ='".$strCatName."'>#".strtolower($strCatName)."</option>";
								}
								?>
							</select>
							<span class="custom dropdown-custom-select ">Select a Tag</span>
						</div>
					</span>
					<a disabled class="btn-secondary-cta disabled post-confession-button right" title="Post Your Confession">Post Your Confession</a>
					<span class="ajax-loader"></span>
				</div>
			</div>
			<div class="post-confession-thanks hide">
				<strong>Thank you for sharing!</strong>
				<?php /*
				<span>Your confession will post after our mothers check it out.</span>
				*/ ?>
				<a title="Post Another Confession" class="btn-secondary-cta post-another-confession" href="#">Post Another Confession</a>
			</div>
		</div>
		<div class="mod-filter-confessions-faq clearfix">
			<h2>Read the Latest Confessions</h2>
			<div class="filter-wrap">
				<span class="label">Filter by:</span>
				<div class="dropdown-custom">
					<select class="tagDropdown" title="Tags" style="z-index: 10; opacity: 0;" >
						<option data-alias="<?php echo $url ?>" value="all">View All</option>
						<?php 
						$childAJQCategroy = '';
						$childAJQCategroy = get_category_children('231');
						$arrChildAJQCategroy = explode('/',$childAJQCategroy);
						sort($arrChildAJQCategroy);
						foreach ($arrChildAJQCategroy as $intCatId){
							if(empty($intCatId)){
									continue;
							}
							$strCatName = '';
							$strCatName = get_the_category_by_ID($intCatId);
							echo "<option data-alias=\"/confessions/?tags=".$strCatName."\" value ='".$strCatName."' >#".strtolower($strCatName)."</option>";
						}
						?>
					</select>
					<span class="dropdown-custom-select"><?php if(isset($_REQUEST['tags'])){ echo $_REQUEST['tags']; }else{ echo "Tags" ; } ?></span>
				</div>
			</div>
		</div>
		
		<?php 
		$strTagSelected = '';
		$strTagSelected = $_REQUEST['tags'];
		if(!empty($strTagSelected)) { ?>
		<div class="mod-list-item-confessions-wrap">
			<div class="load-more-well clearfix">
				<?php 
                                        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
					$args = array(
						'posts_per_page'   => 4,
						'category_name'    => $strTagSelected,
						'orderby'          => 'date',
                                                'paged' => $paged,
						'order'            => 'DESC',
						'post_type'        => 'confessions',
						'post_status'      => 'publish'
					);
					
					
					$the_query = new WP_Query( $args );
                                        
					$intTotalRecords = '';
                                        $intTotalRecords = count($the_query->posts);
                                        
					while ($the_query->have_posts()){
					$the_query->the_post(); 
					?>
					<div class="mod-list-item-confessions mod-list-item">
							<div class="info clearfix"> 
								<?php ?>
									<h4 class="title-wrap left">#<?php echo $the_query->query['category_name']; ?></h4>
                                                                        <a href="<?php the_permalink(); ?>" class="left date"><?php $datepus= ''; $datepus = get_the_date( 'F d, Y'); echo $datepus; ?></a>
									<div class="confession-share right">
										<span class="icon-share"></span>
										<span class="share-btn">Share</span>
										<div class="mod-addthis-hover">
											<div class="addthis_toolbox" addthis:url="<?php  the_permalink(); ?>">
												<span class="addthis-share">Share</span>
											</div>
										</div>
									</div>
									<div class="content-wrap">
										"<?php echo get_the_title(); ?>"
									</div>
							</div>
						</div> <?php 
					}
					?>
			</div>
                    <div class="mod-load-more">
			<?php
                        if($intTotalRecords > 3) {
			// Previous/next page navigation.
                            if ( have_posts() ) : 
                                    the_posts_pagination( array(
                                    'prev_text'          => __( 'Previous page', 'twentysixteen' ),
                                    'next_text'          => __( 'Next page', 'twentysixteen' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
                                    ) );
                           endif;
                        
			?>
                        <a class="button btn-main-cta btn-loading" style = "display:none;" href="/" title="Load more">
                            <i class="fa fa-refresh fa-spin"></i>
                        </a>
                        <?php } ?>
                    </div>
		</div>
		<?php } ?>
	</div>
	<div class="right-column right col-18">
		<?php echo do_shortcode( '[add_block name="life-with-jean"]' ) ?>
		<?php echo do_shortcode( '[social_widget]' ) ?>
	</div>
</div>

<?php get_footer(); ?>