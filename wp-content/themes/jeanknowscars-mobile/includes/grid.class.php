<?php
class Grid {

	function singleItem($post) {
		if(empty($post)) return;

	}

	function loopItems($posts) {
		if(empty($posts)) return;

        global $post;
		foreach ( $posts as $post ) : setup_postdata( $post ); ?> 
        <div class="mod-list-item first-col first-row">
            <div class="row">
                <div class="img-wrap">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <?php
                    if (class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail('post','home-image')){ 
                    MultiPostThumbnails::the_post_thumbnail('post', 'home-image', NULL, 'full', NULL, false);
                    } else {  ?>
                    <img src="<?php bloginfo('template_directory'); ?>/assets/img/jkc-no-image-288x140.jpg" alt="<?php the_title(); ?>" draggable="false">
                    <?php }
                    ?>
                </div>
                <?php
                $categories = get_the_category($the_post->ID);
                $intCategoryId = is_array($categories) ? $categories[0]->cat_ID : $categories->cat_ID;
                $category_name = is_array($categories) ? $categories[0]->name : $categories->name;
                ?>
                <div class="category">
                    <a href="<?php echo get_category_link( $intCategoryId ); ?>"><?=$category_name;?></a>
                </div>
                <?php 
                $strFromatedtitleforReleatedArticle = get_the_title();
                $strlen = strlen($strFromatedtitleforReleatedArticle);
                if($strlen >= 45){
                    $formatedC = substr($strFromatedtitleforReleatedArticle, 0, 45 ).'...'; 
                } else {
                    $formatedC = $strFromatedtitleforReleatedArticle;
                }
                ?>
                <div class="info-wrap">
                    <h4 class="title-wrap"><a class="list-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo $formatedC;?></a></h4>
                    <div class="desc">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; 
        wp_reset_postdata(); 
	}
}