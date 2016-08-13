<?php
define('APP_NAME', 		'Myzone');
define('APP_DOMAIN', 	'easyweb.look.vn');
define('APP_VERSION', 	'0.1');
define('APP_KEY', 		'f9ce8eba4dca87e7a1c065f0ad3fc3b1d63cbc24');

define('GOOGLE_API_KEY', 			'AIzaSyCUnDU9RE6dmZFTm9cAIVrEvHsDh3L6ifg');
define('BING_API_KEY', 			'CrpD7BkAdadMCrPmgU9SOnu+Q6krPnCHRa/4DksG+3o=');
define('YAHOO_API_KEY', 			'a4d6bd9e0dbea20aaed09fcce8402673');
define('WOLFRAMALPHA_API_KEY', 		'UH46KK-ETJJKY26V3');
define('WASHINGTONPOST_API_KEY', 	'778F0B4C-9F3C-42D4-9E79-8BF28FEC925C');

/**
 * Database configuration here
 */
// where is the server MySQL hosted on, usually localhost
define('DB_HOST', 		'');
// name of database used for this project
define('DB_NAME', 		'');
// username and password to login database
define('DB_USER', 		'');
define('DB_PASS', 		'');

/**
 * Don't care the following lines
 */

//  separator used for merging a SQL string
define('SQL_SEPARATOR', '{::::}');

// global date format
define('DATE_FORMAT', 	'D, M d, Y H:i:s O');

// directory separetor, this depends OS
define('DS', DIRECTORY_SEPARATOR);

// absolute path to root
define('DA', dirname(__FILE__).DS);

// root folder;
define('BASE_PATH', '/myzone/');

// path to save cookies
define('COOKIE_PATH', '/');

// path to cache dir
define('ENABLE_CACHING', false);
// path to cache dir
define('CACHE_DIR', 'cache');
// time of available caching in minute
define('CACHE_LIVE_TIME', 	30); //minutes
// caching favicon ico
define('CACHE_FAVICON_DIR', 'res/cache/favicons/');

define('ERROR_PAGES', 'res/errors/');
define('HTML_BLOCK_PATH', 	'res/includes/blocks/');
define('HTML_WIDGET_PATH', 'res/includes/widgets/');

$GLOBALS['LOCKED_NAME'] = array(
	'index', 'admin', 'view', 'edit', 'get', 'post', 'delete', 'put', 
	'search','recommendator', 'act', 'myzone'
);
?>
