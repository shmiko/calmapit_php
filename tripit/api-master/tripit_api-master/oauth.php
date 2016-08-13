<?php
require 'tripit.php';
session_start();
if(isset($_SESSION['mytripit']))
	header ('location: index.php');
?>
<?php
$api_url = 'https://api.tripit.com';
$TRIPIT_API_KEY = 'd249eeb39b00c918b8f6bef2f90a76b0860ca708';
$TRIPIT_API_SECRET = '7d9fc50e99d0ff75c00caaa81a814c6aa5c953f2';

// Render authentication page
if (!isset($_GET['oauth_token'])):
	$TripItAuth = new OAuthConsumerCredential($TRIPIT_API_KEY, $TRIPIT_API_SECRET);
	$TripIt = new TripIt($TripItAuth, $api_url);
	$request_token = $TripIt->get_request_token();
	$post_arr = array(
				'token' => $request_token['oauth_token'],
				'callback' => urlencode('http://planespy.matt/tripit_api/oauth.php?request_token_secret=' . $request_token['oauth_token_secret'])
				);
	
/*	$post_arr = array(
				'token' => $request_token['oauth_token'],
				'callback' => urlencode('http://test.sohnidharti.tv/planespy/tripit_api/oauth.php?request_token_secret=' . $request_token['oauth_token_secret'])
				);
*/
//print_r($post_arr);

mail("farzoaq@gmail.com","PlaneSpy-TripItApi","Authentication");
?>
	

<p>
	<a href="https://www.tripit.com/oauth/authorize?oauth_token=<?php echo $post_arr['token']; ?>&amp;oauth_callback=<?php echo $post_arr['callback']; ?>" class="button">Authenticate with TripIt</a>
</p>
<?php
	exit;
endif;

if (isset($_GET['oauth_token'])):

	// Process Request Token to Access Token
	$TripItAuth = new OAuthConsumerCredential($TRIPIT_API_KEY, $TRIPIT_API_SECRET, $_GET['oauth_token'], $_GET['request_token_secret']);
	$TripIt = new TripIt($TripItAuth, $api_url);
	$token = $TripIt->get_access_token();
	$TripItAuth = new OAuthConsumerCredential($TRIPIT_API_KEY, $TRIPIT_API_SECRET, $token['oauth_token'], $token['oauth_token_secret']);
	$TripIt = new TripIt($TripItAuth, $api_url);
	$_SESSION['mytripit'] = array();
	$_SESSION['mytripit']['token'] = $TripItAuth;
	//$filters['format'] = 'json';
	//$response = $TripIt->_do_request('get', 'profile', $filters);
	//print_r(json_decode($response));
	mail("farzoaq@gmail.com","PlaneSpy-TripItApi","Authenticated");
	header('Location: index.php');
endif;
?>
