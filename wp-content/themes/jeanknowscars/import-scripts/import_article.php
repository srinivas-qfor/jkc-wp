<?php

import_post_from_json(); 
            
function import_post_from_json(){
    global $galleryImages;
    global $articleErrors;
    
    ini_set( 'memory_limit', '2048M' );
    ini_set( 'max_execution_time', 60000 );

    $jsonFile = ABSPATH.'DB Dumps/JSON/JKC_Article_Canonical/output_19.json';   
    $jsonData = json_decode(file_get_contents($jsonFile));
   
    $count = 1;
    $availablecount = 1;
    $errCount = 1;
    foreach($jsonData as $field){
   // if($id == 429031){
    //if($count==20){ break; exit;}//        $count++;

        
    $id = $title = $subTitle = $slug = $promoTitle = $promoTeaserSmall = $promoTeaser = $articleCategories =
            $keywords = $metaTitle = $metaKeywords = $websiteId = $publicationDate = $articleContributor = 
            $articleHeaderImages = $relatedArticleID = $printCoverDate = $releaseDate = $eventYear = $defaults =
            $articleType = $webExclusive = $articleUserID = $content = $url = $canBeGallery = $contributors = 
            $categories = $relatedArticles = $tags = $headerImages = $post_id = NULL;
    
    $id = $field->_id;
    
//    if( !get_permalink( $id ) ){
//        echo "count $unavailablecount - $id <br>";
//        $unavailablecount++;
//     }else{
//         echo "Available count $count - $id <br>";
//         $count++;
//     }
//    
//    continue;
//    exit;
    
    $title = $field->title;
    $subTitle = $field->subTitle;
    $slug = $field->slug;
    $promoTitle = $field->promoTitle;
    $promoTeaserSmall = $field->promoTeaserSmall;
    $promoTeaser = $field->promoTeaser;
    $keywords = $field->keywords; //Array
    $metaTitle = $field->metaTitle;
    $metaKeywords = $field->metaKeywords;//array
    $websiteId = $field->websiteId;
    $publicationDate = $field->publicationDate;
    $printCoverDate = $field->printCoverDate;
    $releaseDate = $field->releaseDate;
    $eventYear = $field->eventYear;
    $articleType = $field->articleType;
    $webExclusive = $field->webExclusive;
    $url = $field->url;
    $canBeGallery = $field->canBeGallery;
    $contributors = $field->contributors;//array/object
    $categories = $field->categories; //Array
    $relatedArticles = $field->relatedArticles; //Array
    $pages = $field->pages; //Array
    $headerImages = $field->headerImages; //Array
    $tags = $field->tags; //Array
    $lastModifiedDate = $field->lastModifiedDate; 
   // Check if post exists create a new one or not insert
if( !get_permalink( $id ) ): 
 
    if(!empty($categories)){
        foreach($categories as $category){
            if($category->isPrimary == 1){
                $articleCategories[] = get_term_id_from_term_meta('categoryID',$category->id);
            }
        }
    }

    if(!empty($contributors)){
        foreach($contributors as $contributor){
            if($contributor->roles[0] == "Writer"){
                $articleContributor = $contributor->id;
            }
        }
        if(empty($articleContributor)){
            $articleContributor = $contributors[0]->id;
        }
        
       $articleUsers = get_users(
            array(
             'meta_key' => 'userID',
             'meta_value' => $articleContributor,
             'number' => 1,
             'count_total' => false
            )
           );
       $articleUserID = $articleUsers[0]->ID;    
    }
    
    if(!empty($relatedArticles)){
        foreach($relatedArticles as $relatedArticle){
           $relatedArticleID = array($relatedArticle->articleId);
        }
    }
        
    if(!empty($headerImages)){

        foreach($headerImages as $imageKey => $headerImage){
            if(!empty($imageKey) && !empty($headerImage->fileMasterId )){
             $headerImageID =  save_header_images($imageKey,$headerImage->fileMasterId,$headerImage->fileName,$id);

                if(!empty($headerImageID)){
                    $articleHeaderImages[$imageKey] =  $headerImageID ;
                }
            }
        }
    }
        
$content = get_content_html_from_json($pages,$id);

if(empty($content)){
    $articleErrors[] = "ERROR: article content empty $id <br>";
    
}

$defaults = array('post_status' => 'publish','post_date'=>$printCoverDate, 'post_modified' => $lastModifiedDate,'post_type' => 'post', 'post_author' => $articleUserID,
            'post_parent' => 0,'menu_order' => 0, 'post_content_filtered' => $promoTeaserSmall, 'post_excerpt' => $promoTeaser, 'import_id' => $id,
            'post_content' => $content,'post_name' => $slug, 'post_title' => $title, 'post_category' => $articleCategories, 'context' => '');


        // Add post
        $post_id = wp_insert_post( $defaults );
        if(!empty($post_id)){

            update_post_meta($post_id, 'postID', $post_id);
            update_post_meta($post_id, 'subTitle', $subTitle);
            update_post_meta($post_id, 'slug', $slug);
            update_post_meta($post_id, 'promoTitle', $promoTitle);
            update_post_meta($post_id, 'promoTeaserSmall', $promoTeaserSmall);
            update_post_meta($post_id, 'promoTeaser', $promoTeaser);
            update_post_meta($post_id, 'keywords', $keywords);
            update_post_meta($post_id, 'metaTitle', $metaTitle);
            update_post_meta($post_id, 'metaKeywords', $metaKeywords);
            update_post_meta($post_id, 'websiteId', $websiteId);
            update_post_meta($post_id, 'publicationDate', $publicationDate);
            update_post_meta($post_id, 'printCoverDate', $printCoverDate);
            update_post_meta($post_id, 'releaseDate', $releaseDate);
            update_post_meta($post_id, 'eventYear', $eventYear);
            update_post_meta($post_id, 'articleType', $articleType);
            update_post_meta($post_id, 'webExclusive', $webExclusive);
            update_post_meta($post_id, 'url', $url);
            update_post_meta($post_id, 'canBeGallery', $canBeGallery);
            update_post_meta($post_id, 'contributors', $contributors);
            update_post_meta($post_id, 'categories', $categories);
            update_post_meta($post_id, 'relatedArticles', $relatedArticles);
            update_post_meta($post_id, 'headerImages', $articleHeaderImages);
            update_post_meta($post_id, 'galleryImages', $galleryImages);
            update_post_meta($post_id, 'tags', $tags);
            echo "Success: $count - $id <br>";
             $count++;
        }else{
            $articleErrors[] =  "ERROR POST CREATION  $errCount - $id <br>";
        } 
   elseif(get_permalink( $id )):
        echo "Available count $availablecount - $id <br>";
        $availablecount++;
   endif;

    if(!empty($articleErrors)){
        
        echo "<pre>";
        print_r($articleErrors);
        echo "</pre>";
    }
   
    $errCount++;
    $galleryImages = array();
    $articleErrors = array();
    //break;
            }
    
   //} // 429031
}

function get_content_html_from_json($pages,$articleId){
    global $galleryImages;
    global $articleErrors;
    $html = '';
    $current = '';
    $TotalGalleryImages = array();
    $galleryImages;
    foreach ($pages as $k => $currentPage) {
        foreach ($currentPage->pageElements as $pageEntity) {
            
            if ($pageEntity->type == 'paragraph') {
                $imageDownloadUrl = $attachmentUrl = $imageDownloadUrlPath = $file_name =  null;
                //Paragraph
                $html .= '<p class="mod-text clearfix">';

                @$inlineImage = $pageEntity->image;

                if ($inlineImage) {
                    $html .= '<span class="mod-inline-img">';

                    $TotalGalleryImages++;
                     $imageDownloadUrlPath =  $inlineImage->fileMasterId."+w360/".$inlineImage->fileName;  
                     $imageDownloadUrl = "http://image.adam.automotive.com/f/".$imageDownloadUrlPath;
                     $file_name = $inlineImage->fileMasterId."_inline_".$inlineImage->fileName;
                     $attachmentUrl = download_attachment($imageDownloadUrl,$file_name,$articleId);
                     if(empty($attachmentUrl)){
                         $articleErrors[] = "ERROR: Download attachment failed. url  - $imageDownloadUrl articleId - $articleId entityType - paragraph <br>";
                     }
                     
                     if($inlineImage->showInGallery == 1 ){
                         save_gallery_images($inlineImage->fileMasterId,$inlineImage->fileName,$articleId);
                     }
                     
                    $html .= '<img class="inline-img img" src="' . $attachmentUrl[1] . '" filemasterid="' . $inlineImage->fileMasterId . '" articleid="' . $jsonData->_id . '" imagename="' . $inlineImage->fileName . '"/>';

                    $caption = $inlineImage->caption;
                    if ($caption) {
                        $html .= '<span class="inline-img-caption">' . $caption . '</span>';
                    }
                    $html .= '</span>';
                }
                $html .= $pageEntity->text . '</p>';
            } elseif ($pageEntity->type == 'imagegroup') {
                
                if ($pageEntity->imagesPerLine > 1) {
                    //list the images and link to a photo gallery
                    foreach ($pageEntity->images as $image) {
                       // echo "image group loop iamges <br>";
                        if($image->showInGallery == 1){
                          //  $galleryImages[] = $image->fileMasterId;
                            save_gallery_images($image->fileMasterId,$image->fileName,$articleId);
                        }
                        $TotalGalleryImages++;
                    }
                } else {

                    $html .= '<div class="mod-article-stepbystep">';
                    //just one image per line, so put it down.
                    foreach ($pageEntity->images as $image) {
                        //echo "image group loop iamges <br>";
                        $imageDownloadUrl = $attachmentUrl = $imageDownloadUrlPath = null;
                        $imageDownloadUrlPath =  $image->fileMasterId."+w640/".$image->fileName;  
                        $imageDownloadUrl = "http://image.adam.automotive.com/f/".$imageDownloadUrlPath;
                        $file_name = $image->fileMasterId."_imagegroup_".$image->fileName;
                        $attachmentUrl = download_attachment($imageDownloadUrl,$file_name,$articleId);
                        $TotalGalleryImages++;
                        if(empty($attachmentUrl)){
                         $articleErrors[] = "ERROR: Download attachment failed. url  - $imageDownloadUrl articleId - $articleId entityType - imagegroup <br>";
                        }
                        //echo " showInGallery imagegroup ".$image->showInGallery."<br>";
                        if($image->showInGallery == 1){
                            
                            save_gallery_images($image->fileMasterId,$image->fileName,$articleId);
                        }
                        
                        $html .= '<img class="stepbystep-img img" src="' . $attachmentUrl[1] . '" filemasterid="' . $image->fileMasterId . '" articleid="' . $jsonData->_id . '" imagename="' . $image->fileName . '"/>';
                        $caption = $image->caption;
                        if ($caption) {
                            $html .= '<div class="stepbystep-img-caption">' . $caption . '</div>';
                        }
                    }
                    $html .= '</div>';
                }
            } else if ($pageEntity->type == 'image') {
                
                $imageDownloadUrl = $attachmentUrl = $imageDownloadUrlPath = null;
                $imageDownloadUrlPath =  $pageEntity->fileMasterId."+w640/".$pageEntity->fileName;  
                $imageDownloadUrl = "http://image.adam.automotive.com/f/".$imageDownloadUrlPath;
                $file_name = $image->fileMasterId."_image_".$image->fileName;
                $attachmentUrl = download_attachment($imageDownloadUrl,$file_name,$articleId);
                
                if(empty($attachmentUrl)){
                    $articleErrors[] = "ERROR: Download attachment failed. url  - $imageDownloadUrl articleId - $articleId entityType - image <br>";
                }  
                //Single Image
                $html .= '<div class="mod-single-img">';
                $html .= '<img class="single-img img" src="' . $attachmentUrl[1] . '" filemasterid="' . $pageEntity->fileMasterId . '" articleid="' . $jsonData->_id . '" imagename="' . $pageEntity->fileName . '"/>';


                $caption = $pageEntity->caption;
                if ($caption) {
                    $html .= '<div class="single-img-caption">' . $caption . '</div>';
                }
                $html .= '</div>';
                   //echo " showInGallery image ".$pageEntity->showInGallery."<br>";
               if($pageEntity->showInGallery){
                           save_gallery_images($pageEntity->fileMasterId,$pageEntity->fileName,$articleId);
                       }    
                $TotalGalleryImages++;
            } else if ($pageEntity->type == 'blockquote') {
                //Block Quote
                $html .= '<blockquote>' . $pageEntity->text . '</blockquote>';
            } else if ($pageEntity->type == 'table') {
                //Table
                $html .= '<div class="mod-table">' . $pageEntity->text . '</div>';
            }
        }
        $processCount++;
    }
    return $html;
}

function get_term_id_from_term_meta($meta_key = 'categoryID', $meta_value = NULL ){
    global $wpdb;
    $query  = $wpdb->prepare("SELECT wp_termmeta.term_id FROM wp_termmeta where wp_termmeta.meta_key = '".$meta_key."' and wp_termmeta.meta_value = '".$meta_value."'","");
    $featured_writers_ids = $wpdb->get_col($query);
    $featured_writers_id =  implode(",",$featured_writers_ids);
    return $featured_writers_id;                   
}
//($field, $value)//
     
function get_article_content_from_id($articleID){
global $wpdb;
$articleQuery  = $wpdb->prepare("SELECT content FROM articles where articleID = '".$articleID."'","");
$articleContent = $wpdb->get_col($articleQuery);
return html_entity_decode($articleContent[0], ENT_QUOTES);
}

function save_gallery_images($fileMasterId,$fileName,$articleId){
    global $galleryImages;
    global $articleErrors;
    $imageDownloadUrlPath =  $fileMasterId."+w640/".$fileName;  
    $imageDownloadUrl = "http://image.adam.automotive.com/f/".$imageDownloadUrlPath;
    $file_name = $fileMasterId."_inline_gallery-large_".$fileName;
    $attachmentID = download_attachment($imageDownloadUrl,$file_name,$articleId);
    if(empty($attachmentID)){
        $articleErrors[] = "ERROR: Download attachment failed. url  - $imageDownloadUrl articleId - $articleId entityType - gallery-large <br>";
    }
    if(!empty($attachmentID[0])){
       $galleryImages[] = $attachmentID[0];
       update_post_meta($attachmentID[0], 'gallery-large', $articleId);

       $imageDownloadUrlPath =  $fileMasterId."+w160+h100+re0+cr1+ar0/".$fileName;  
       $imageDownloadUrl = "http://image.adam.automotive.com/f/".$imageDownloadUrlPath;
       $file_name = $fileMasterId."_inline_gallery-small_".$fileName;
       $attachmentID = download_attachment($imageDownloadUrl,$file_name,$attachmentID[0]);
       if(empty($attachmentID)){
        $articleErrors[] = "ERROR: Download attachment failed. url  - $imageDownloadUrl articleId - $articleId entityType - gallery-small <br>";
       }
       if($attachmentID[0]){
            update_post_meta($attachmentID[0], 'gallery-small', $articleId);
       }
      
    }
}

 function save_header_images($imageType,$fileMasterId,$fileName,$articleId){
    global $articleErrors;
    if($imageType == "header" || $imageType == "promoLarge"){
        $imageDownloadUrlPath =  $fileMasterId."+w640/".$fileName; 
    }elseif($imageType == "homepage"){
        $imageDownloadUrlPath =  $fileMasterId."+w288+h140+re0+cr1+ar0/".$fileName; 
    }else{
        $imageDownloadUrlPath =  $fileMasterId."+w1024/".$fileName; 
    }
      
    
    $imageDownloadUrl = "http://image.adam.automotive.com/f/".$imageDownloadUrlPath;
    $file_name = $fileMasterId."_".$imageType."_".$fileName;
    $attachmentID = download_attachment($imageDownloadUrl,$file_name,$articleId);
    if(empty($attachmentID)){
        $articleErrors[] = "ERROR: Download attachment failed. url  - $imageDownloadUrl articleId - $articleId entityType - HeaderImages  $imageType <br>";
    }
    if($attachmentID[0]){
            update_post_meta($articleId,$imageType,$attachmentID[0]);
            if ($imageType == "header") {
                 update_post_meta($articleId, "_thumbnail_id", $attachmentID[0]);
            }elseif ($imageType == "promoLarge") {
                update_post_meta($articleId, "post_flipper-image_thumbnail_id", $attachmentID[0]);
            }elseif($imageType == "homepage"){
                 update_post_meta($articleId, "post_home-image_thumbnail_id", $attachmentID[0]);
            }
            return $attachmentID[0];
    }else{
        return false; 
    }
   
 }
 
 

?>

