<?php
ob_start();
session_write_close();
//set_time_limit(10);
date_default_timezone_set("GMT");
session_start();
/**
 * turn off magic quotes
 * currently this settings have not yet use
**/
if(get_magic_quotes_gpc()){
	function stripslashes_deep($value){
		return (is_array($value)?array_map('stripslashes_deep', $value):stripslashes($value));
	}
	$_POST = array_map('stripslashes_deep', $_POST);
	$_GET = array_map('stripslashes_deep', $_GET);
	$_COOKIE = array_map('stripslashes_deep', $_COOKIE);
}
/**
 * merge input blocks from GET & POST
 * this to remove COOKIES values and set hight priority to POST
**/
$GLOBALS['BP_REQUEST'] = array_merge($_GET, $_POST);
$GLOBALS['BP_PATH'] = str_replace('?'.$_SERVER['QUERY_STRING'], '', $_SERVER['REQUEST_URI']);

?>
