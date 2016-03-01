<?php 
/**
 * Partial: Related article for main article
 */

?>
<?php
//print_r($post);
$categories = get_the_category( $post->ID);
$intCategoryId = $categories[0]->cat_ID;
$strCategoryName = $categories[0]->cat_name;
$args = array( 'cat' => $intCategoryId ,'order'   => 'DESC' , 'posts_per_page' =>'2');
// The Query
$the_query = new WP_Query( $args );



// The Loop
echo '<h3>Related Articles</h3>';
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
            <div class="mod-list-item left <?php if($i == 0 ){ echo "first-col "; } ?>first-row">
                <div class="row">
                    <div class="img-wrap">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php
                            
                                                                if (class_exists('MultiPostThumbnails')){ 
                                    +                                MultiPostThumbnails::the_post_thumbnail('post', 'flipper-image', NULL, 'full', NULL, false);
                                } else { ?>
                                                                <img src="<?php bloginfo('template_directory'); ?>/assets/img/jkc-no-image-288x140.jpg" alt="<?php the_title(); ?>" draggable="false">
                                                                 <?php }
                                ?>
                                </a>
                                </div>
                    <div class="category">
                        <a href="<?php  get_category_link( $intCategoryId ); ?>"><?php echo $strCategoryName;?></a>
                    </div>
                    <div class="info-wrap">
                        <h4 class="title-wrap"><a class="list-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo $formatedC; ?> ...</a></h4>
                        <div class="desc"><?php the_excerpt(); ?></div>
                    </div>
                </div>
            </div>
        <?php   
$i++;       
    }
} else {
    echo "no posts found";
}
?>