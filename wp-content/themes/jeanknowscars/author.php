<?php
/**
 * The template for displaying Author archive pages
 *
 */

get_header(); 

## Loading CSS for pages
wp_enqueue_style( 'lay-two-column', get_template_directory_uri() . '/assets/css/lay-two-column.css',null,null,"screen" );
wp_enqueue_style( 'mod-contributors-detail', get_template_directory_uri() . '/assets/css/mod-contributors-detail.css',null,null,"screen" );
wp_enqueue_style( 'mod-title', get_template_directory_uri() . '/assets/css/mod-title.css',null,null,"screen" );
wp_enqueue_style( 'mod-stay-connected', get_template_directory_uri() . '/assets/css/mod-stay-connected.css',null,null,"screen" );
wp_enqueue_style( 'mod-load-more-vehicle', get_template_directory_uri() . '/assets/css/mod-load-more-vehicle.css',null,null,"screen" );


$userSocialLinks = array();
foreach(get_the_author_meta('userSocialLinks') as $social) {
	$userSocialLinks[$social->LinkType] = $social->LinkUrl;
}

$id = get_post();

?>

<div class="content-top-wrap" id="post-<?php the_ID(); ?>">
    <div class="row">
        <div class="main-column left col-17">
            <!--Navigation-Links-->
            <?php get_template_part('template-parts/navigation','breadcrumb'); ?>   

            <div class="mod-title">
                <div class="page-title"><span itemprop="name">Author Bio</span></div>
            </div> 

            <div class="mod-contributors-detail">
            	<div class="bio" itemscope="" itemtype="http://schema.org/Person">
            		<div class="row">
            			<div class="editor-main col-2 columns clearfix">

            			<?php
            			if($id->post_author == 39){ ?>
					
                               <img class="img" src="/wp-content/themes/jeanknowscars/assets/img/jean-jennings.jpg" alt="Jean Jennings"  height="auto" width="113">

							<?php }
							else if ($id->post_author == 15) {
								?>

								<img class="img" src="/wp-content/themes/jeanknowscars/assets/img/laura-sky-brown.jpg" alt="Laura Sky Brown"  height="174" width="261">
                                
							
							<?php } else if ($id->post_author == 28) { ?>
								<img class="img" src="/wp-content/themes/jeanknowscars/assets/img/molly-jean.jpg" alt="Molly Jean"  height="174" width="261">

							<?php }

            			?>

            			</div>
            			<div class="editor-content col-10 columns" itemprop="description">
            				<h1 class="article-title" itemprop="name"><?=the_author_meta('display_name')?></h1>
            				<span class="job-title" itemprop="jobTitle"><?=the_author_meta('userJobTitle')?></span>
            				<?php if ( get_the_author_meta( 'description' ) ) : ?>
            					<p><?php the_author_meta( 'description' ); ?></p>
							<?php endif; ?>							
							<div class="social">
								<a rel="nofollow" href="<?=get_author_posts_url(the_author_meta('ID'))?>" title="<?=the_author_meta('display_name')?>">Bio</a>
								<?php if(!empty($userSocialLinks['Email'])) { ?>
								<span>|</span>
								<a rel="nofollow" target="_blank" itemprop="follows" href="mailto:<?=$userSocialLinks['Email']?>" title="Send email to <?=the_author_meta('display_name')?>?>">Email</a>
								<?php } 
								if(!empty($userSocialLinks['Facebook'])) { ?>
								<span>|</span>
								<a rel="nofollow" target="_blank" itemprop="follows" href="<?=$userSocialLinks['Facebook']?>">Facebook</a>
								<?php }
								if(!empty($userSocialLinks['Twitter'])) { ?>
								<span>|</span>
								<a rel="nofollow" target="_blank" itemprop="follows" href="<?=$userSocialLinks['Twitter']?>" title="Follow <?=the_author_meta('display_name')?> on Twitter">Twitter</a>
								<?php }
								if(!empty($userSocialLinks['Google+'])) { ?>
								<span>|</span>
								<a rel="nofollow" target="_blank" itemprop="follows" href="<?=$userSocialLinks['Google+']?>" title="Follow <?=the_author_meta('display_name')?> on Google Plus">Google Plus</a>
								<?php } ?>
							</div>
            			</div>
            		</div>
            	</div>

            	<div class="mod-recent-stories-by-author">
            		<h2 class="box-title">Recent Stories by <?=the_author_meta('display_name')?></h2>
            		<?php if ( have_posts() ) :
	                    // Start the loop.
	                    while ( have_posts() ) : the_post();
	                    global $post;
	                    ?>
	                    <div class="contributors-article" itemscope="" itemtype="http://schema.org/Article">
							<a href="<?=the_permalink();?>" title="<?=the_title();?>" class="recent-image-container">
							<img itemprop="thumbnailUrl" onerror="this.src='/img/jkc-no-image-288x140.jpg'" src="http://image.jeanknowscars.com/f/86836658+w288+h140+re0+cr1+ar0/mercedes-gla-homepage.jpg" alt="2015 Mercedes-Benz GLA45 AMG" />
							</a>
							<div class="recent-story-container">
								<a href="<?=the_permalink();?>" itemprop="url" class="story-title">
								<h3 itemprop="headline"><?=the_title();?></h3>
								</a>
								<span itemprop="datePublished" class="story-date"><?=the_date();?></span>
								<span itemprop="description" class="story-text"><?=the_excerpt();?></span>
							</div>
						</div>
						<?php 
	                    // End the loop.
	                    endwhile;
	                  	endif; 
	            	?>
	            	</div>
	            </div>
	            <?php 
	            global $wp_query;
	            if ( have_posts() && $wp_query->max_num_pages > 1) : ?>
	            <div class="mod-load-more-vehicle clearfix">
	            	<a class="first page-numbers" href="<?=get_pagenum_link(1);?>"><i class="fa fa-step-backward"></i></a>
	            	<?php
	            	the_posts_pagination( array(
						'prev_text'          => __( '<i class="fa fa-caret-left"></i>', 'twentysixteen' ),
						'next_text'          => __( '<i class="fa fa-caret-right"></i>', 'twentysixteen' ),
						'screen_reader_text' => __('', 'twentysixteen'),
					) );
	            	?>
	            	<a class="last page-numbers" href="<?=get_pagenum_link($wp_query->max_num_pages);?>"><i class="fa fa-step-forward"></i></a>
	            </div>
	            <?php endif; ?>
	        </div>

        <div class="right-column right col-18">
            <!-- Car-Confessions -->                 
            <?php echo do_shortcode('[add_block name="car-confessions" ad_col_wrap="off"]') ?>
            <?php get_sidebar('stay-connected'); ?>
        </div>            
    </div>
</div>

<?php get_footer(); ?>
