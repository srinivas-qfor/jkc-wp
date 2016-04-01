<?php
/*
 * Template Name: Gallery Page Template
 * Description: Page template for gallery to display
 */

get_header();
# Loading CSS for photo gallery page

?>

<div class="mod-photo-overlay-mobile hide">
    <div class="gallery-wrap row">
        <span class="close-btn"></span>
        <div class="clearfix content-wrap">
            <img src="<?php echo bloginfo('template_url'); ?>/assets/img/loading.gif" alt="" />
            <div class="caption"></div>
        </div>
    </div>
</div>
<div class="mod-gallery-mobile">
    <div class="mod-gallery">
        <h1 class="page-title" itemprop="name"><?php echo $post->post_title; ?> - Photo Gallery</h1>
        <div class="info clearfix">
            <div class="back-to-article left"><a href="<?php the_permalink(); ?>">Return to Article</a></div>
            <div class="social right">
                <span class="share-btn left">Share</span>
                <div class="mod-addthis-hover">
                    <div class="addthis_toolbox" >
                        <span class="addthis-share left">Share</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="pg-wrapper">
        <?php 	
            $strDefaultUploadBaseURL = '';
            $strDefaultUploadBaseURL= '';
            $arrAttachedImages = '';
            $pattern = '/photo-(.*?).html/';
            preg_match($pattern,$_SERVER['REQUEST_URI'],$matchs);
            $arrDefalutUploadURL = wp_upload_dir();
            $strDefaultUploadBaseURL = $arrDefalutUploadURL['baseurl'];
            $arrAttachedImages = get_post_meta($post->ID,'galleryImages');			
            $post_thumbnail_id = get_post_thumbnail_id( $post->ID );
            $arrMainImageArray = array($post_thumbnail_id);
            $newarray = array_merge($arrMainImageArray, $arrAttachedImages[0]); 
            ?>
            <div class="pg-overlay"><?php
                foreach( $newarray as $key=>$strAttachedImage){
                       $arrAttachedImageDetails = wp_get_attachment_metadata($strAttachedImage);
                       $arrAttachedImagePostDetails = get_post($strAttachedImage);
                       $strImageURL = $strDefaultUploadBaseURL."/".$arrAttachedImageDetails['file'];
                       $a = '';
                       if( ($key + 1 ) == ( $matchs[1] )){
                               $a = 'current';
                       }
                       ?>
                       <div id="large-slide-<?php echo ($key+1); ?>" class="large-slide <?php echo $a; ?>" data-count="<?php echo ($key+1); ?>">
                            <div itemprop="<?php if($key+1 == 1 ) { echo "primaryImageOfPage"; } else{ echo "image"; }; ?>" itemscope itemtype="http://schema.org/ImageObject">
                                <span class="zoom-gallery" data-overlay="<?php echo $strImageURL; ?>" data-caption="<?php echo $arrAttachedImagePostDetails->post_title; ?>"></span>
                                <img itemprop="contentUrl" src="<?php echo $strImageURL; ?>" alt="<?php echo $arrAttachedImagePostDetails->post_title; ?>" onerror="this.src='/img/noimage.jpg'" />
                                <meta itemprop="height" content="auto" />
                                <meta itemprop="width" content="640" />
                                <span itemprop="caption" class="hide"><?php echo $arrAttachedImagePostDetails->post_title; ?></span>
                            </div>
                            <?php if (!empty($caption)) { ?>
                                <div class="large-title">
                                    <?php echo $arrAttachedImagePostDetails->post_title; ?>
                                </div>
                            <?php } ?>
                       </div>                       
                <?php } ?>
                    <div class="large-slide-arrow next" data-s-object-id="PhotoGallery:MainImage:Arrows:Right" ><i class="fa fa-angle-right"></i></div>
                    <div class="large-slide-arrow prev" data-s-object-id="PhotoGallery:MainImage:Arrows:Left" ><i class="fa fa-angle-left"></i></div>
             </div>
              
            <div class="pg-control">
                <div class="flow clearfix">
                    <?php
                        foreach( $newarray as $key=>$strAttachedImage){
                        $a = '';
                        if(($key + 1) == $matchs[1]){
                                $a = 'current';
                        }
                        $arrAttachedImageDetails = '';
                        $arrAttachedImageDetails = wp_get_attachment_metadata($strAttachedImage);
                        $arrAttachedImagePostDetails = '';
                        $arrAttachedImagePostDetails = get_post($strAttachedImage);
                        $largeBattern = '/-large_/';
                        $smallerBatter = '/-small_/';
                        $matches = '';
                        if(preg_match($largeBattern,$arrAttachedImageDetails['file'],$matches)){
                            //replace large with small
                            if($matches){
                                $strSmallImageName = '';
                                $strSmallImageNameURL = '';
                                $strUploadPaths = '';
                                $strSmallImagePath = '';
                                $strSmallImageName = str_replace('-large_','-small_',$arrAttachedImageDetails['file']);
                                $strSmallImageNameURL = $strDefaultUploadBaseURL.'/'.$strSmallImageName;
                                $strSmallImagePath = $arrDefalutUploadURL['path'].'/'.$strSmallImageName;
                                if( file_exists( $strSmallImagePath ) ) {
                                        $strImageURL = $strSmallImageNameURL;
                                }else{
                                        $strImageURL = $strDefaultUploadBaseURL."/".$arrAttachedImageDetails['file'];
                                }
                            }
                        }else{
                            $arrImageURLDetails = wp_get_attachment_image_src ( $strAttachedImage, 'gallerypage-thumb');
                            $strImageURL = $arrImageURLDetails[0];
                        }
                        ?>
                    
                    
                        <div id="" class="img-item left thumbnail-<?php echo ( $key+1) ?> thumbnail-item <?php echo ($a) ?>">
                            <a class="thumbnail-link" href="<?php echo get_the_permalink()."photo-". ( $key+1). ".html"; ?>" title="<?php echo $arrAttachedImagePostDetails->post_title;; ?>" data-count="<?php echo ( $key+1 ); ?>">
                                <img src="<?php echo $strImageURL; ?>" alt="<?php  echo $arrAttachedImagePostDetails->post_title; ?>" width="100%" height="82" onerror="this.src='<?php bloginfo('template_url'); ?>/assets/img/noimage.jpg'" />
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
         </div>
     </div>   
</div>
<?php get_footer(); ?>	
