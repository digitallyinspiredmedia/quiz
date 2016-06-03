<?php
session_start() ;
require_once __DIR__ . '/src/Facebook/autoload.php';

# login-callback.php
$fb = new Facebook\Facebook([
 'app_id' => '1276326552379294', // Replace {app-id} with your app id
  'app_secret' => '569e3d4bd889b81743d672446f6bb202',
  'default_graph_version' => 'v2.2',
]);

$helper = $fb->getRedirectLoginHelper();
try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (isset($accessToken)) {
  // Logged in!
  $_SESSION['facebook_access_token'] = (string) $accessToken;

  // OAuth 2.0 client handler
$oAuth2Client = $fb->getOAuth2Client();

// Exchanges a short-lived access token for a long-lived one
$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);


// Sets the default fallback access token so we don't have to pass it to each request
$fb->setDefaultAccessToken($longLivedAccessToken);

try {
  $response = $fb->get('/me?fields=email'');
  $userNode = $response->getGraphUser();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

echo 'Logged in as ' . $userNode->getName();

$graphObject = $response->getGraphObject();
$email = $graphObject->getProperty('email');  // This is not getting any thing

echo $email; // Empty

}
?>
