<?php include_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php' );
$user_info = wp_get_current_user();
if($_GET['post_type_up']=='image')
{
	
	$url = site_url('/members/'.$current_user->user_login.'/media/'.$_GET['activity']);
}
else
{
	$url = get_permalink($_GET['activity']);
}
//  Configure your OAuth settings from your application at https://dev.twitter.com/apps

//define('YOUR_CONSUMER_KEY', '8cqwyMtXbxrgXWkNT3g');
//define('YOUR_CONSUMER_SECRET', 'CldeJgmeWviAZWt8RHhgcifiy5zukAXDmYl9KgoogE');

// Configure authentication credentials.
// Get these from the 'users' table for any authenticated user which was done in step2.php

//define('ACCESS_TOKEN', '195678921-RQbqnV5LupJpaIxM0S50oWjgITFHF7nQooZbxpM');
//define('ACCESS_TOKEN_SECRET', 'bVX1TndVzyrXaz2w7n9kvoQYc54zChvRguu3yleM'); 
  
$token_secret 		= get_user_meta(1, 'nextend_token_secret_connect');
$new_fb_settings = get_user_meta(1, 'nextend_fb_connect');
$consumer_key 		= $new_fb_settings[0]['nextend_twitter_consumer_key'];
$consumer_secret 	= $new_fb_settings[0]['nextend_twitter_consumer_secret'];

$nextend_twitter_token_key = get_user_meta( $user_info->ID, "nextend_twitter_token_key");
$nextend_twitter_token_secret = get_user_meta( $user_info->ID, "nextend_twitter_secret_key");





	global $wpdb;
		
		$user_info = wp_get_current_user();
		if ($user_info->ID) {
				$target_id = $wpdb->get_row('SELECT ID, type, identifier FROM wp_social_users WHERE type = "fb" AND ID ='.$user_info->ID.'');
				if (isset($_POST) && isset($target_id->identifier)) {
					 
					 require_once (dirname(__FILE__) . '/sdk/init.php');
					 $post_id = $facebook->api(
							//See stream publish documentation on developers.facebook.com
							//to see more parameters
							array(
								'method' => 'stream.publish',
								'message' => "View this post ".$url."",
								//'attachment' => "",
								//'action_links' => ,
								//'target_id' => $target_id,
								'uid' => $target_id->identifier
							)
					);
				}
		}





// Require client library and authorize an instance with your creds

require __DIR__.'/twitter-client.php';
$Client = new TwitterApiClient;
$Client->set_oauth ($consumer_key, $consumer_secret, $nextend_twitter_token_key[0], $nextend_twitter_token_secret[0]);

// Now you're ready to make authorized API calls

try {
    $path = 'statuses/update';
    $args = array ('status' => "View this post ".$url."");
    $data = $Client->call($path, $args, 'POST');
    print_r($data);
}
catch( TwitterApiException $Ex ){
    echo 'Status ', $Ex->getStatus(), '. Error '.$Ex->getCode(), ' - ',$Ex->getMessage(),"\n";
}



?>