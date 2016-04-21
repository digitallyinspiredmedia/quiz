<?php
session_start();
// added in v4.0.0
require_once 'autoload.php';
require 'functions.php'; // Include functions
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphUser;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
// init app with app id and secret
FacebookSession::setDefaultApplication( '256307411385030','a9f25027f6f13d824836ec33c08472be' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('http://localhost/quiz/fbconfig.php' );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me?locale=en_US&fields=id,name,email,first_name,last_name' );
//  "$request = new FacebookRequest( $session, 'GET', '/me?locale=en_US&fields=first_name,last_name,email' );"
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();
     	$fbid = $graphObject->getProperty('id');              // To Get Facebook ID
 	    $fbname = $graphObject->getProperty('name'); // To Get Facebook full name
 	    $fbfname = $graphObject->getProperty('first_name'); // To Get Facebook full name
 	    $fblname = $graphObject->getProperty('last_name'); // To Get Facebook full name
	    $femail = $graphObject->getProperty('email');    // To Get Facebook email ID
	/* ---- Session Variables -----*/
	    $_SESSION['FBID'] = $fbid;
     $_SESSION['FULLNAME'] = $fbname;
     $_SESSION['USERNAME'] = $fbfname;
	    $_SESSION['EMAIL'] =  $femail;
    /* ---- header location after session ----*/
    checkuser($fbid,$fbname,$femail);
  header("Location: index.php");
} else {
  $loginUrl = $helper->getLoginUrl();
 header("Location: ".$loginUrl);
}
?>
