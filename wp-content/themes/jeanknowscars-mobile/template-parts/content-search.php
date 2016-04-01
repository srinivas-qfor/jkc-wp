<?php
/**
 * This template to show the search results
 *
 * @package JKC
 */
?>
<div class="mod-list-item mod-list-item-search-mobile">
    <div class="row">
        <div class="img-wrap">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php
                if (class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail('post','home-image')){ 
                     MultiPostThumbnails::the_post_thumbnail('post', 'home-image', NULL, 'large', NULL, false);
                }else { ?>
                     <img src="<?php bloginfo('template_directory'); ?>/assets/img/jkc-no-image-288x140.jpg" alt="<?php the_title(); ?>" height="192" width="288">
                 <?php }
                 ?>
            </a>
        </div>
        <div class="info-wrap">
            <?php
                $strSearchformatedTitle = '';
                $strSearchformatedTitle = get_the_title();
                $$strlen = '';
                $strlen = strlen($strSearchformatedTitle);
                $formatedCT = '';
                if($strlen >= 50){
                $formatedCT = substr($strSearchformatedTitle, 0, 50 ).'...'; 
                }else{
                $formatedCT = $strSearchformatedTitle;
                }
            ?>
            <span class="article-date"><span class="fa fa-clock-o"></span><?php the_date(); ?></span>
                 <?php
                    $strSearchArticleContent = '';
                    $formatedC = '';
                    $strSearchArticleContent = get_post_meta($post->ID, 'subTitle', true);
                    $strlen = strlen($strSearchArticleContent);

                    if($strlen >= 120){
                    $formatedC = substr($strSearchArticleContent, 0, 120 ).'...'; 
                    }else{
                    $formatedC = $strSearchArticleContent;
                    }
                ?>
            <h4 class="title-wrap"><a class="list-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo $formatedCT;  ?></a></h4>
                <div class="desc">
                    <?php echo esc_html($formatedC); ?>
                </div>
        </div>
    </div>
</div>   

