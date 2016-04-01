<?php
/*
Plugin Name: JKC Flipper Image Order
Description: Chnage the image position of the flipper slider
Version: .1
Author: Qfor
*/

add_action( 'admin_menu', 'jkc_slider_image_order' );

function jkc_slider_image_order() {
    add_menu_page(__('Slider Images','slider-image-order'), __('Slider Images','slider-image-order'), 'manage_options', 'jkc-slider-order-main-menu', 'slider_order_main_menu_page' );
}

function slider_order_main_menu_page() {
    if(isset($_POST['updateflipperorder']) && $_POST['updateflipperorder'] == 'Update Flipper Order'){
        $arrAvailablePostId = '';
        $arrAvailablePostId = $_POST['postid'];
        foreach($arrAvailablePostId as $key=>$iintPostId){            
            update_post_meta($iintPostId, '_featured-post-home-order', $_POST['updateFlipperOrderNumber'][$key]);
          
        }
        $strMessage = 'Flipper Images order updated successfully.';
    }
    if(isset($_REQUEST['defid']) && $_REQUEST['defid'] != '') {
        $intPostId = '';
        $intPostId = trim($_REQUEST['defid']);
        if(get_post_status($_REQUEST['defid'])){
            if(update_post_meta($intPostId, '_featured-post-home-order', '') && update_post_meta($intPostId, '_featured-post-home', ''))
            {
                $strMessage = 'Successfully Updated';
            }
        }
    }
    ?>
<div class='wrap'>
    <h1>Flipper Images order</h1>
    <div style="text-align: center; font-size: 15px; color: green; font-weight: bold; padding-bottom:10px;" ><?php if(!empty($strMessage)) { echo $strMessage; $strMessage = ''; }?></div>
    <table class="wp-list-table widefat fixed striped posts">
	<thead>
            <tr>
                <th scope="col" class="manage-column" width="5%;">
                     <span>#</span>
                </th>
                <th scope="col" class="manage-column" width="50%;">
                     <span>Title</span>
                </th>
                <th scope="col" class="manage-column" width="20%;">
                     <span>Category</span>
                </th>
                <th scope="col" class="manage-column" width="15%;">
                     <span>Order</span>
                </th>
                <th scope="col" class="manage-column" width="25%;">
                     <span>Update</span>
                </th>
            </tr>
	</thead>
        <?php        
        
        $args = array(
            'posts_per_page' => 10,
            'meta_key' => '_featured-post-home-order',
            'order' => 'ASC',
            'orderby'   => 'meta_value_num', 
            'meta_query' => array(
                array(
                    'key' => '_featured-post-home',
                    'value' => 1
                )
            )
         );
        $flipperImageOrderRecords = new WP_Query( $args );
        if($flipperImageOrderRecords->have_posts()):
            ?>
            <tbody id="the-list"> 
                <?php 
                     $i = 1; 
                     ?>
            <form action="#" method="post" name="frmUpdtaeFlipperForm">    
               
                    <?php
                     while($flipperImageOrderRecords->have_posts()):
                         $flipperImageOrderRecords->the_post();
                         $arrCategoryNmae = '';
                         $arrCategoryName = (get_the_category(get_the_ID()));
                ?>
                    <tr>
                        <td width="10%;"><?php echo $i ?></td>
                        <td><a href="<?php the_permalink()?>" target="_blank"><?php echo get_the_title() ?></a></td>
                        <td><?php echo $arrCategoryName[0]->name ?></td>
                        <td><input type="hidden" name="postid[]" value="<?php echo get_the_ID(); ?>"><input type="text" name="updateFlipperOrderNumber[]" size="2" value="<?php echo get_post_meta(get_the_ID(),'_featured-post-home-order',true); ?>"></td>
                        <td><a href="?page=jkc-slider-order-main-menu&defid=<?php echo the_ID(); ?>">Remove</a></td>
                    </tr>
                <?php
                     $i++;
                     endwhile; 
                ?>
                    <tr><td colspan="4" style="text-align: right;"><input type="submit" name="updateflipperorder" value="Update Flipper Order"></td></tr> 
            </form>
            </tbody>
            <?php
        endif;
        ?>
</table>
</div>    
    <?php 
}