<?php

get_header(); 
wp_enqueue_style( 'lay-one-column', get_template_directory_uri() . '/assets/css/lay-one-column.css',null,null,"screen" );
wp_enqueue_style( 'mod-breadcrumbs', get_template_directory_uri() . '/assets/css/mod-breadcrumbs.css',null,null,"screen" );
wp_enqueue_style( 'mod-reset', get_template_directory_uri() . '/assets/css/reset.css',null,null,"screen" );
wp_enqueue_style( 'mod-global', get_template_directory_uri() . '/assets/css/global.css',null,null,"screen" );
wp_enqueue_style( 'mod-footer', get_template_directory_uri() . '/assets/css/mod-footer.css',null,null,"screen" );
wp_enqueue_style( 'mod-header', get_template_directory_uri() . '/assets/css/mod-header.css',null,null,"screen" );
wp_enqueue_style( 'mod-life-with-jean', get_template_directory_uri() . '/assets/css/mod-life-with-jean.css',null,null,"screen" );
wp_enqueue_style( 'mod-car-confession', get_template_directory_uri() . '/assets/css/mod-car-confession.css',null,null,"screen" );
wp_enqueue_style( 'mod-get-social', get_template_directory_uri() . '/assets/css/mod-get-social.css',null,null,"screen" );
wp_enqueue_style( 'mod-load-more', get_template_directory_uri() . '/assets/css/mod-load-more.css',null,null,"screen" );
wp_enqueue_style( 'grid', get_template_directory_uri() . '/assets/css/grid.css',null,null,"screen" );
wp_enqueue_style( 'mod-filter-confessions-faq', get_template_directory_uri() . '/assets/css/mod-filter-confessions-faq.css',null,null,"screen" );
wp_enqueue_style( 'mod-faq-title', get_template_directory_uri() . '/assets/css/mod-faq-title.css',null,null,"screen" );
wp_enqueue_style( 'mod-faq-form', get_template_directory_uri() . '/assets/css/mod-faq-form.css',null,null,"screen" );
wp_enqueue_style( 'mod-list-item-faq-css', get_template_directory_uri() . '/assets/css/mod-list-item-faq.css',null,null,"screen" );
wp_enqueue_script( 'jquery11', 'http://code.jquery.com/jquery-1.11.0.min.js',null,null,true); 
wp_enqueue_script( 'load', 'http://a.postrelease.com/serve/load.js?async=true',null,null,true); 
wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.js',null,null,true); 
wp_enqueue_script( 'selectivizr', get_template_directory_uri() . '/assets/js/selectivizr-min.js',null,null,true); 
wp_enqueue_script( 'mod-ad-header', get_template_directory_uri() . '/assets/js/mod-ad-header.js',null,null,true); 
wp_enqueue_script( 'typekit', 'http://use.typekit.net/hcl6hob.js',null,null,true); 
wp_enqueue_script( 'jquery-cookie', get_template_directory_uri() . '/assets/js/jquery.cookie.min.js',null,null,true); 
wp_enqueue_script( 'plugins', get_template_directory_uri() . '/assets/js/plugins.js',null,null,true); 
wp_enqueue_script( 'global', get_template_directory_uri() . '/assets/js/global.js',null,null,true);
wp_enqueue_script( 'mod-header', get_template_directory_uri() . '/assets/js/mod-header.js',null,null,true); 
wp_enqueue_script( 'mod-get-instagram', get_template_directory_uri() . '/assets/js/mod-get-instagram.js',null,null,true); 
wp_enqueue_script( 'mod-load-more', get_template_directory_uri() . '/assets/js/mod-load-more.js',null,null,true); 
wp_enqueue_script( 'mod-filter-confessions-faq', get_template_directory_uri() . '/assets/js/mod-filter-confessions-faq.js',null,null,true); 
wp_enqueue_script( 'mod-faq-form', get_template_directory_uri() . '/assets/js/mod-faq-form.js',null,null,true); 
wp_enqueue_script( 'mod-list-item-faq', get_template_directory_uri() . '/assets/js/mod-list-item-faq.js',null,null,true); 
?>
<style>
.mod-faq-title h1{
	display:block !important;
	margin: -216px 0 15px 40px !important;
}

.faq-inner .wp-image-715268{ width:100%; }
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
		<div class="mod-faq-title">
			<div class="faq-wrap">
				<div class="faq-inner" style="background-image: none;">
				<img class="alignnone size-full wp-image-715268" src="http://local.jeanknowscars.com/wp-content/uploads/pg-auto-know-header.jpg" alt="pg-auto-know-header" width="624" height="236" />
				<h1>Go ahead</h1>
				<span class="faq-text1">ask me a question, I have the answers</span>
				<span class="faq-text2">literally</span>

				</div>
			</div>
			<a class="faq-btn-alt-cta askAQuestion">Ask Me a Question</a>
		</div>
		
		<div class="mod-faq-form hide">
			<div class="auto-login-container questionLogin hide clearfix">
				<div class="right">
					<div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="false" onlogin="checkLoginState();"></div>
				</div>
				<div class="left auto-login-dont-have">You must login to post a question! <span class="auto-login-cancel">Cancel</span></div>
			</div>
			<div class="post-faq-form hide">
				<div class="form-title clearfix">
					<div class="left auto-login-dont-have">Hi <span class="username">guest</span>! Ask your question below.</div>
					<span class="right auto-login-cancel">Cancel</span>
				</div>
				<div class="clearfix">
					<span class="faq-post-remaining">(150 characters remain)</span>
					<textarea class="faq-textarea" id="faq-textarea"></textarea>
					<span class="faq-tag-ctr">
						<div class="dropdown-custom">
							<select id='tagDropdown' class="tagDropdown" title="Tags" style="z-index: 10; opacity: 0;" >
								<option data-alias="/ask-jean-question-1/" value="all">View All</option>
								<?php 
								$childAJQCategroy = get_category_children('220');
								$arrChildAJQCategroy = explode('/',$childAJQCategroy);
								sort($arrChildAJQCategroy);
								echo "<option value=\"Select a Tag\" selected=\"selected\">Select a Tag</option>";
								foreach ($arrChildAJQCategroy as $intCatId){
									if(empty($intCatId)){
											continue;
									}
									$strCatName = '';
									$strCatName =get_the_category_by_ID($intCatId);
									if($strCatName == $strSelectedTag){
											$s = 'selected="selected"';
									}
									echo "<option ".$strCatName." ".$strSelectedTag." data-alias=\"/ask-jean-question/?tags=".$strCatName."\" value ='".$strCatName."' ".$s.">".$strCatName."</option>";
								}
								?>
							</select>
							<span class="dropdown-custom-select"><?php echo $strSelectedTag; ?></span>
						</div>
					</span>
					<a class="btn-secondary-cta disabled post-faq-button right" title="Submit Question">Submit Question</a>
					<span class="ajax-loader"></span>
				</div>
			</div>
			<div class="post-faq-thanks hide">
				<strong>Thank you for sharing!</strong>
				<?php /*
				<span>Your question will post after our mothers answer it.</span>
				*/ ?>
				<a title="Post Another faq" class="btn-secondary-cta post-another-faq" href="#">Post Another Question</a>
			</div>
		</div>  
		
		<?php $strSelectedTag = ''; $strSelectedTag = $_REQUEST['tags']; ?>
		<div class="mod-filter-confessions-faq clearfix" style="border-bottom:none; padding:0;">
			<h2>Latest Q&amp;As</h2>
			<div class="filter-wrap">
				<span class="label">Filter by:</span>
				<div class="dropdown-custom">
					<select class="tagDropdown" title="Tags" style="z-index: 10; opacity: 0;" >
						<option data-alias="/ask-jean-question/?tags=View All" value="all" >View All</option>
						<?php 
						$childAJQCategroy = get_category_children('220');
						$arrChildAJQCategroy = explode('/',$childAJQCategroy);
						sort($arrChildAJQCategroy);
						echo "<option value=\"Select a Tag\" selected=\"selected\">Select a Tag</option>";
						foreach ($arrChildAJQCategroy as $intCatId){
							if(empty($intCatId)){
									continue;
							}
							$strCatName = '';
							$strCatName =get_the_category_by_ID($intCatId);
							if($strCatName == $strSelectedTag){
									$s = 'selected="selected"';
							}
							echo "<option ".$strCatName." ".$strSelectedTag." data-alias=\"/ask-jean-question/?tags=".$strCatName."\" value ='".$strCatName."' ".$s.">".$strCatName."</option>";
						}
						?>
					</select>
					<span class="dropdown-custom-select"><?php if(empty($strSelectedTag)){ echo "View All"; }else {echo $strSelectedTag;} ?></span>
				</div>
			</div>
        </div>
		
		<?php 
		if(isset($_REQUEST['tags']) && $_REQUEST['tags'] != ''){
			if($_REQUEST['tags'] == 'View All'){
				$args = array(
					'posts_per_page'   => -1,
					'orderby'          => 'date',
					'order'            => 'DESC',
					'post_type'        => 'ask-jean-question',
					'post_status'      => 'publish',
					'suppress_filters' => true 
				);
			}else{
				$args = array(
					'posts_per_page'   => -1,
					'offset'           => 0,
					'category_name'    => $strSelectedTag,
					'orderby'          => 'date',
					'order'            => 'DESC',
					'post_type'        => 'ask-jean-question',
					'post_status'      => 'publish',
					'suppress_filters' => true 
				);
			}
			
			$isTagResults = get_posts( $args ); 
		}
		
		?>
		<div class='mod-list-item-faq-wrap'><div class='load-more-well clearfix'><?php
		if($isTagResults){
			foreach ( $isTagResults as $strTagResult){
				$categories = get_the_category($strTagResult->ID); 
				?>
				<div class="mod-list-item-faq">
					<div class="question-label">QUESTION</div>
					<div class="info-wrap clearfix">
						<div class="author-image left">
							<img src="<?php bloginfo('template_url');?>/assets/img/default_profile.png" alt="" />
						</div>
						<div class="question-text">
							<?php echo $strTagResult->post_title; ?>
						</div>
					</div>
					<div class="info-wrap date-author">
						<span class="date"><?php $datepus = get_the_date( 'F d, Y', $strTagResult->ID ); echo $datepus; ?></span>
						<span class="tag"><?php echo $categories[0]->cat_name; ?></span>
						<span class="author-name"><?php echo get_post_meta($strTagResult->ID, '_jkc_jaq_author', true); ?></span>
					</div>
					<div class="answer-wrap">
						<div class="answer-label">See Jean's Answer</div>
						<div class="answer-container clearfix" style="display: none;">
							<div class="jean-image left">
								<img src="<?php bloginfo('template_url');?>/assets/img/jean-avatar.png" alt="" />
							</div>
							<div class="answer-text">
								<?php echo $strTagResult->post_content; ?>
							</div>
						</div>
					</div>
				</div>
				<?php
			}
		}
		?></div></div>
    </div>
	
	<div class="right-column right col-18">
		<?php echo do_shortcode('[add_block name="car-confessions" ad_col_wrap="off"]') ?>
		<?php echo do_shortcode( '[add_block name="life-with-jean"]' ) ?>
		<?php echo do_shortcode( '[social_widget]' ) ?>
		
	</div>
</div>

<?php get_footer(); ?>
