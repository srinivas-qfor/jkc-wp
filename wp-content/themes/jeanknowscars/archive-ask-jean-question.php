<?php
get_header(); 

?>
<style>
.mod-faq-title h1{
	display:block !important;
	margin: -216px 0 15px 40px !important;
}
.faq-inner .wp-image-746134{ width:100%; }
</style>
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
	<?php
	$theAJQPage = '';
	$theAJQPage = get_page_by_title( 'Ask Jean a Question', 'ARRAY_A', 'page' );
	?>
		<div class="mod-faq-title">
			<?php echo $theAJQPage['post_content'] ;?>
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
							<select id='tagDropdown' class="tagDropdown" title="Select a Tag" style="z-index: 10; opacity: 0;" >
								<option value="Select a Tag">Select a Tag</option>
								<?php 
								$childAJQCategroy = '';
								$childAJQCategroy = get_category_children('220');
								$arrChildAJQCategroy = explode('/',$childAJQCategroy);
								sort($arrChildAJQCategroy);
								foreach ($arrChildAJQCategroy as $intCatId){
									if(empty($intCatId)){
											continue;
									}
									$strCatName = '';
									$strCatName =get_the_category_by_ID($intCatId);
									echo "<option ".$strCatName." ".$strSelectedTag." data-alias=\"/ask-jean-question/?tags=".$strCatName."\" value ='".$strCatName."'>".$strCatName."</option>";
								}
								?>
							</select>
							<span class="custom dropdown-custom-select">Select a Tag</span>
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
		<?php $strSelectedTag = ''; $strSelectedTag = $_REQUEST['tags']; if(isset($_REQUEST['Products'])){
				$strSelectedTag = 'Tech &amp; Products';
			} ?>
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
						foreach ($arrChildAJQCategroy as $intCatId){
					
							if(empty($intCatId)){
									continue;
							}
							
							$strCatName = '';
							$strCatName =get_the_category_by_ID($intCatId);
                                                        $s = '';
							if($strCatName == $strSelectedTag){
                                                            
                                                            $s = 'selected="selected"';
							}
							echo "<option ".$strCatName." ".$strSelectedTag." data-alias=\"/ask-jean-question/?tags=".$strCatName."\" value ='".$strCatName."' ".$s.">".$strCatName."</option>";
						}
						?>
					</select>
					<span class="dropdown-custom-select"><?php if(empty($strSelectedTag)){ echo "Tags"; }else {echo $strSelectedTag;} ?></span>
				</div>
			</div>
        </div>
		
		<?php 
		
		if($strSelectedTag != ''){
			if($strSelectedTag == 'View All'){
				$args = array(
					'posts_per_page'   => -1,
					'offset'=> 0,
					'orderby'          => 'date',
					'order'            => 'DESC',
					'post_type'        => 'ask-jean-question',
					'post_status'      => 'publish'
				);
			}else{
				if($strSelectedTag == 'Car Buying'){
					 $categoryidObj = '';
					 $categoryid = '';
					 $categoryidObj = get_category_by_slug('car-buying-ajq'); 
					 $categoryid = $categoryidObj->cat_ID;
					$args = array(
						'posts_per_page'   => -1,
						'offset'=> 0,
						'category'    => $categoryid,
						'orderby'          => 'date',
						'order'            => 'DESC',
						'post_type'        => 'ask-jean-question',
						'post_status'      => 'publish'
					);
				}elseif($strSelectedTag == 'Maintenances'){
					$args = array(
						'posts_per_page'   => -1,
						'offset'=> 0,
						'category_name'    => $strSelectedTag,
						'orderby'          => 'date',
						'order'            => 'DESC',
						'post_type'        => 'ask-jean-question',
						'post_status'      => 'publish'
					);
				}else{
					$args = array(
						'posts_per_page'   => -1,
						'offset'=> 0,
						'category_name'    => $strSelectedTag,
						'orderby'          => 'date',
						'order'            => 'DESC',
						'post_type'        => 'ask-jean-question',
						'post_status'      => 'publish'
					);
				}
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
						<span class="author-name"><?php $strAuthorMetaData = get_post_meta($strTagResult->ID, '_jkc_jaq_author', true); $arrSplitAuthorName = explode('|',$strAuthorMetaData); echo $arrSplitAuthorName[0]; ?></span>
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