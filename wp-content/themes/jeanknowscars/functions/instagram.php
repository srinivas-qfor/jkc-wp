<?php

/*
* Retrieve instagram feed fot ajax call
*/

function get_instagram_feed() {

    // get the config
    $instagram = array(
        'client_id'  => '555f92ac3cb64ce3ab21018193094413',
        'access_token'   => '21375191.555f92a.c650f6203ce84acba7165cdc0c13884d',
        'user_id' => 21375191
    );

    $count = !empty($_GET['show']) ? (int)$_GET['show'] : 3;
    $max_id = !empty($_GET['max_id']) ? ($_GET['max_id']) : false;

    $json['max_id'] = (isset($max_id)) ? ('&max_id=' . trim($max_id)) : '';
    $access_token = $instagram['access_token'];
    $client_id = $instagram['client_id'];
    $user_id = $instagram['user_id'];

    $api_url = 'https://api.instagram.com/v1/users/' . $user_id . '/media/recent/?client_id=' . $client_id . '&access_token=' . $access_token . '&count=' . $count . $json['max_id'];
    $data = json_decode(file_get_contents($api_url), true);
    $tmpImages = array();
    foreach ($data['data'] as $image) {
        $image['created_time'] = date('Y/m/d H:i:s', $image['created_time']);
        $tmpImages[] = $image;
    }
    $data['data'] = $tmpImages;
    $json['images'] = $data['data'];
    
    $json['max_id'] = (isset($data['pagination']['next_max_id'])) ? trim($data['pagination']['next_max_id']) : '';

    $result = json_encode($json);

    echo $result; exit;
}
add_action( 'wp_ajax_instagram', 'get_instagram_feed' );
add_action( 'wp_ajax_nopriv_instagram', 'get_instagram_feed' );