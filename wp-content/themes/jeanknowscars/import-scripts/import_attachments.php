
<?php


//import_attachment_by_articles();


ini_set( 'memory_limit', '2048M' );
ini_set( 'max_execution_time', 6000 );
require_once(ABSPATH . 'wp-admin/includes/media.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/image.php');



function import_attachment_by_articles(){
 wp_reset_postdata();
 query_posts(array(
    'post_status' => 'publish',
    'orderby' => 'menu_order',
    'order' => 'DESC',
    'posts_per_page' => '-1'
        ));

if (have_posts()) :
    $i = 1;
    while (have_posts()) : the_post();

    $post_meta = get_post_meta(get_the_ID());
    
    if(!empty($post_meta['headerImages'])){
        
        
            $post_meta_headerImages = unserialize($post_meta['headerImages'][0]);
            
            foreach($post_meta_headerImages as $key => $header_images){
                $metaPostID = $media_item = null;
                echo get_the_ID()."--".$header_images."--";
                
                $metaPostID = get_post_id_by_meta_key_and_value('post_id', get_the_ID());
                
                $media_item = get_permalink( $metaPostID ); 

                
                if(!empty($metaPostID) && !empty($media_item) ){
                    echo "$metaPostID available <br>";
                    set_post_thumbnail(get_the_ID(), $metaPostID);
                            update_post_meta(get_the_ID(),'post_promo-image_thumbnail_id',$metaPostID);
                    continue;
                    
                }else{
                    //print_r($metaPostID);
                    echo " $metaPostID not attachment $media_item <br>";
                }
                
                
                $attachment_id = null;
                    if($key== "header"  || $key== "promoSmall" || $key=="homepage"){
                        add_image_size( 'promo-small', 288, 9999 ); 
                    }elseif($key== "promoLarge" || $key == 'imagegroup'){
                            add_image_size( 'promo-large', 650, 317  ); 
                            add_image_size( 'promo-small', 288, 9999 ); 
                    }
                
                    $filename = get_attachment_details_from_table($key,get_the_ID(),$header_images);
                    if(empty($filename)){
                        $filename = $header_images.'-'.$key.'.jpg';
                    }
                    $url ="http://image.adam.automotive.com/f/{$header_images}/{$filename}";
                    
                    $attachment_id = download_attachment($url,$filename,get_the_ID());
                    if(!empty($attachment_id)){
                        update_post_meta($attachment_id,'post_id',get_the_ID());
                        update_post_meta($attachment_id,'imageType',$key);
                        //if($key=="header"){
                            set_post_thumbnail(get_the_ID(), $attachment_id);
                            update_post_meta(get_the_ID(),'post_promo-image_thumbnail_id',$attachment_id);
                        //}
                        echo "Success";
                    }else{
                        echo "Fail";
                    }
                    echo "<br>";
       }
    }
//    echo "<pre>";
//    print_r($post_meta['headerImages']);
//    echo "</pre>";
//    echo "<br>";
     endwhile;
    wp_reset_postdata();
endif;
}


//
//
//$latest_posts = get_posts();
//
//foreach($latest_posts as $latest_post){
//    echo "ID is ".$latest_post->ID."<br>";
//    $post_meta_tags = get_post_meta($latest_post->ID);
//    
//            echo "<pre>";
//print_r($post_meta_tags);
//echo "</pre>";
//}



function get_attachment_details_from_table( $image_type, $article_id, $filemasterId){
    global $wpdb;
    $featured_writers_id = null;
    $query  = $wpdb->prepare("SELECT name,downLoadUrl FROM `articleimages` where imageType = '".$image_type."' and articleId = '".$article_id."' and filemasterId = '".$filemasterId."' order by articleId ","");
    $featured_writers_ids = $wpdb->get_col($query);
   
    
   $featured_writers_id =  implode(",",$featured_writers_ids);

   return $featured_writers_id;                   
}

                //echo get_the_post_thumbnail('thumbnail' );
                //echo get_the_post_thumbnail('thumbnail' );
//                   if (class_exists('MultiPostThumbnails')) :
//                    MultiPostThumbnails::the_post_thumbnail('post', 'home-image', NULL, 'medium', NULL, true);
//                   endif;
                   


function download_attachment($url,$name,$post_id){
//echo "URL $url <br>";
//echo "NAME $name <br>";
//echo "POST ID $post_id <br>";
//echo "################################# <br>";
$tmp = download_url( $url );
 
$file_array = array(
    'name' => $name,
    'tmp_name' => $tmp
);
 
/**
 * Check for download errors
 * if there are error unlink the temp file name
 */
//if ( is_wp_error( $tmp ) ) {
//    @unlink( $file_array[ 'tmp_name' ] );
//    return $tmp;
//}
 
/**
 * now we can actually use media_handle_sideload
 * we pass it the file array of the file to handle
 * and the post id of the post to attach it to
 * $post_id can be set to '0' to not attach it to any particular post
 */
 
$id = media_handle_sideload( $file_array, $post_id );

/**
 * We don't want to pass something to $id
 * if there were upload errors.
 * So this checks for errors
 */
//if ( is_wp_error( $id ) ) {
//    @unlink( $file_array['tmp_name'] );
//    return $id;
//}
 
/**
 * No we can get the url of the sideloaded file
 * $value now contains the file url in WordPress
 * $id is the attachment id
 */
$value = wp_get_attachment_url( $id );
$returnValues = array($id,$value);
return $returnValues;
}


function get_post_id_by_meta_key_and_value($key, $value) {
	global $wpdb;
	$meta = $wpdb->get_results("SELECT * FROM `".$wpdb->postmeta."` WHERE meta_key='".$wpdb->escape($key)."' AND meta_value='".$wpdb->escape($value)."' LIMIT 0,1");
	if (is_array($meta) && !empty($meta) && isset($meta[0])) {
		$meta = $meta[0];
		}	
	if (is_object($meta)) {
		return $meta->post_id;
		}
	else {
		return false;
		}
}

 
