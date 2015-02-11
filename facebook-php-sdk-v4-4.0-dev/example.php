<?php

// Skip these two lines if you're using Composer
/*define('FACEBOOK_SDK_V4_SRC_DIR', '/src/Facebook/');
require __DIR__ . '/autoload.php';*/
session_start();
 
 
require_once( 'Facebook/FacebookSession.php' );
require_once( 'Facebook/FacebookRedirectLoginHelper.php' );
require_once( 'Facebook/FacebookRequest.php' );
require_once( 'Facebook/FacebookResponse.php' );
require_once( 'Facebook/FacebookSDKException.php' );
require_once( 'Facebook/FacebookRequestException.php' );
require_once( 'Facebook/FacebookAuthorizationException.php' );
require_once( 'Facebook/GraphObject.php' );
require_once( 'Facebook/Entities/AccessToken.php' );
require_once( 'Facebook/HttpClients/FacebookHttpable.php' );
require_once( 'Facebook/HttpClients/FacebookCurlHttpClient.php' );
require_once( 'Facebook/HttpClients/FacebookCurl.php' ); 

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookHttpable;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookCurl;



$redirect_login_url = 'http://localhost/slick/facebook-php-sdk-v4-4.0-dev/example.php';
FacebookSession::setDefaultApplication('1033351130013312','45d781f240672235bc7acc27635ee73c');
 
// create a helper opject which is needed to create a login URL
// the $redirect_login_url is the page a visitor will come to after login
$helper = new FacebookRedirectLoginHelper( $redirect_login_url);
 
// First check if this is an existing PHP session
if ( isset( $_SESSION ) && isset( $_SESSION['fb_token'] ) ) {
// create new session from the existing PHP sesson
$session = new FacebookSession( $_SESSION['fb_token'] );
try {
// validate the access_token to make sure it's still valid
if ( !$session->validate() ) $session = null;
} catch ( Exception $e ) {
// catch any exceptions and set the sesson null
$session = null;
echo 'No session: '.$e->getMessage();
}
}  elseif ( empty( $session ) ) {
// the session is empty, we create a new one
try {
// the visitor is redirected from the login, let's pickup the session
$session = $helper->getSessionFromRedirect();


} catch( FacebookRequestException $e ) {
// Facebook has returned an error
echo 'Facebook (session) request error: '.$e->getMessage();
} catch( Exception $e ) {
// Any other error
echo 'Other (session) request error: '.$e->getMessage();
}
}

	
// see if we have a session
if ( isset( $session ) ) {
// save the session
echo $_SESSION['fb_token'] = $session->getToken();
// create a session using saved token or the new one we generated at login
$session = new FacebookSession( $session->getToken() );
// graph api request for user data
$request = new FacebookRequest( $session, 'GET', '/me' );
$response = $request->execute();
// get response
$graphObject = $response->getGraphObject()->asArray();
// print profile data
echo '<pre>' . print_r( $graphObject, 1 ) . '</pre>';
// print logout url using session and redirect_uri (logout.php page should destroy the session)
echo '<a href="' . $helper->getLogoutUrl( $session, 'http://localhost/slick/facebook-php-sdk-v4-4.0-dev/example.php' ) . '">Logout</a>';
} else {
// show login url
echo '<a href="' . $helper->getLoginUrl( array( 'email', 'user_friends' ) ) . '">Login</a>';
} 