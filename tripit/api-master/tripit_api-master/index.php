<?php
require 'tripit.php';
session_start();
if(!isset($_SESSION['mytripit']))
	header ('location: oauth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
TEST1!
TEST2!
<?php


$token = $_SESSION['mytripit']['token'];
$api_url = 'https://api.tripit.com';
if($token):
	$TripIt = new Tripit($token, $api_url);
	$filters['format'] = 'json';
	
	$response = $TripIt->_do_request('get', 'profile', $filters);
	$profile = json_decode($response);

	//echo "<pre>";
	//print_r($profile);
	//echo "</pre>";	
	
try{	
	$user_detail = array();
	$user_detail['name'] = $profile->Profile->public_display_name;
	$user_detail['username'] = $profile->Profile->screen_name;
	$user_detail['is_pro'] = $profile->Profile->is_pro;
	$user_detail['profile_url'] = $profile->Profile->profile_url;
	$user_detail['home_city'] = $profile->Profile->home_city;
	//$user_detail['emailsingle'] = $profile->Profile->ProfileEmailAddresses->ProfileEmailAddress->address;
	//$user_detail['emailmulti'] = $profile->Profile->ProfileEmailAddresses->ProfileEmailAddress[0]->address;
} catch (Exception $e) {
	echo 'Got Error >> '.$e->getMessage();
}


	//echo "<pre>";
	//print_r($user_detail);
	//echo "</pre>";

	$filters['include_objects'] = 'true';
	$response = $TripIt->_do_request('list', 'trip', $filters );
	$future_trips = json_decode($response, FALSE);
	//$object = json_decode(json_encode($array), FALSE);

	echo "<pre>";
	print_r($future_trips);
	echo "</pre>";
	
/*	echo "Future Trips:<br />";
	foreach ($future_trips->Trip as $trip):
		echo $trip->display_name." - ".$trip->primary_location." - ".$trip->start_date." - ".$trip->end_date."<br />";	
	endforeach;
*/
endif;
	
	

/*
$json = <<<EOT
{"Trip":
   {"start_date":"2015-12-09",
    "end_date":"2015-12-27",
    "primary_location":"New York, NY"
   }
}
EOT;


print "Create a new test trip using JSON to New York: \n";
$r = $TripIt->create($json, 'json');
echo "<pre>";
print_r($r);
echo "</pre>";
*/

?>
</body>
</html>