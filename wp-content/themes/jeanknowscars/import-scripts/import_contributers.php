<?php
ini_set( 'memory_limit', '2048M' );
ini_set( 'max_execution_time', 6000 );
insert_user();
function insert_user(){
    
    $jsonFile = ABSPATH.'DB Dumps/JSON/27022016/Contributor.json';   
    $jsonData = json_decode(file_get_contents($jsonFile));
    
    foreach($jsonData as $user_data){
        //echo "<pre>";
        $userID = $userBio = $userDisplayName = $userFileMasterId = $userFirstName = 
        $userLastName =   $userJobTitle =  $userTypes = $userStaffStatusOrder = 
        $userStaffTypeOrder =  $userSocialLinks = $userLogin = $userEmail = NULL;
        
         $userID = $user_data->_id;
         $userBio = $user_data->Bio;
         $userDisplayName = $user_data->DisplayName;
         $userFileMasterId = $user_data->FileMasterId;
         $userFirstName = $user_data->FirstName;
         $userLastName = $user_data->LastName;
         $userJobTitle = $user_data->JobTitle;
         $userTypes = $user_data->Types;
         $userStaffStatusOrder = $user_data->StaffStatusOrder;
         $userStaffTypeOrder = $user_data->StaffTypeOrder;
         $userSocialLinks = $user_data->SocialLinks; // Array
         $userLogin =  sanitize_title($userDisplayName);
         //$userEmail = $userSocialLinks[];
         //print_r($userSocialLinks);
         if(!empty($userSocialLinks)){
             foreach($userSocialLinks as $userSocialLink){
                 if($userSocialLink->LinkType == "Email"){
                      $userEmail = $userSocialLink->LinkUrl;
                 }
             }
         }
        //echo "</pre>";
        
        $userdata = array(
            'user_login'  =>  $userLogin,
            'user_nicename'    =>  $userLogin,
            'display_name'    =>  $userDisplayName,
            'nickname'    =>  $userLogin,
            'first_name'    =>  $userFirstName,
            'last_name'    =>  $userLastName,
            'description'    =>  $userBio,
            'user_email'   =>  $userEmail  // When creating an user, `user_pass` is expected.
        );
        
        $existingUser = reset(
            get_users(
             array(
              'meta_key' => 'userID',
              'meta_value' => $userID,
              'number' => 1,
              'count_total' => false
             )
            )
           );
         
         
         //echo "$count -  $userID <br>";
        // print_r($user);
         if(empty($existingUser)){

                $user_id = wp_insert_user( $userdata ) ;

                //On success
                if ( ! is_wp_error( $user_id ) ) {

                    update_user_meta( $user_id, 'userID', $userID );
                    update_user_meta( $user_id, 'userFileMasterId', $userFileMasterId );
                    update_user_meta( $user_id, 'userJobTitle', $userJobTitle );
                    update_user_meta( $user_id, 'userTypes', $userTypes );
                    update_user_meta( $user_id, 'userStaffStatusOrder', $userStaffStatusOrder );
                    update_user_meta( $user_id, 'userStaffTypeOrder', $userStaffTypeOrder );
                    update_user_meta( $user_id, 'userSocialLinks', $userSocialLinks );
                }else{
                    echo "Fail : ". $userID;
                    echo "<br>";
                }
         }
    }
}
