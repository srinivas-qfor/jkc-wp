<?php
get_header(); 
?>
<style>
 .mod-confessions-title{ position: relative; }
 .mod-confessions-title >img { position: absolute; }
.confessions-title-inner{ position: relative; }
.mobile-page .confessions-title-inner{ margin-top: 0;}
.mobile-page .confessions-title-inner > div { display: none; }
</style>
        <div class="mod-confessions-title">
	<?php
	$theAJQPage = '';
	$theAJQPage = get_page_by_title( 'Car Confessions', 'ARRAY_A', 'page' );
	?>
	<?php
	if(!empty($theAJQPage['post_content'])){
		echo $theAJQPage['post_content'] ;
	}
	?>
        </div>
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
                <?php 
                if ( shortcode_exists( 'add_block' ) ) {
                        echo do_shortcode( '[add_block name="life-with-jean"]' ) ;
                }
                if(shortcode_exists('social_widget')){
                    echo do_shortcode( '[social_widget]' );
                } ?>
<?php get_footer(); ?>