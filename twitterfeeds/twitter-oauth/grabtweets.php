<?

//We use already made Twitter OAuth library
//https://github.com/mynetx/codebird-php
require_once ('codebird.php');

//Twitter OAuth Settings, enter your settings here:
$CONSUMER_KEY = 'K8Kggw18Dd3WsqCYfq0vzdeQx';
$CONSUMER_SECRET = 'IsdP2TPrtSiRFeZnYuwjzlN1UHBeZFZtRa4Ippswe0VAHxGBr5';
$ACCESS_TOKEN = '29664554-I4tOznq8ztIn3vUzYktE7yAfM7Oq0eCrCmqoymsay';
$ACCESS_TOKEN_SECRET = 'Uti9xGMpdDfM322j5G7EduSRh5QbJ3inh2b75JapGfuZu';

//Get authenticated
Codebird::setConsumerKey($CONSUMER_KEY, $CONSUMER_SECRET);
$cb = Codebird::getInstance();
$cb->setToken($ACCESS_TOKEN, $ACCESS_TOKEN_SECRET);


//retrieve posts
$q = $_POST['q'];
$count = $_POST['count'];
$api = $_POST['api'];

//https://dev.twitter.com/docs/api/1.1/get/statuses/user_timeline
//https://dev.twitter.com/docs/api/1.1/get/search/tweets
$params = array(
	'screen_name' => $q,
	'q' => $q,
	'count' => $count
);

//Make the REST call
$data = (array) $cb->$api($params);

//Output result in JSON, getting it ready for jQuery to process
echo json_encode($data);

?>