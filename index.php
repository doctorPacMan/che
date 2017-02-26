<?php
error_reporting(E_ALL);
ini_set ('display_errors', '1');

define('ROOT', dirname(__FILE__).DIRECTORY_SEPARATOR);
define('HTTP', '//'.$_SERVER['SERVER_NAME']);
//=================================================================
// parse url
//=================================================================
if (isset($_SERVER["REQUEST_URI"])) {
	$URL_PARAMS = explode("?", $_SERVER["REQUEST_URI"]);
	$URL_PARAMS = preg_split("/\//", $URL_PARAMS[0], -1, PREG_SPLIT_NO_EMPTY);
} else $URL_PARAMS = array();

if(false) {
	echo('<pre>');
	echo(ROOT.'<br />'.HTTP.'<hr />');
	$initphp = ROOT."etc".DIRECTORY_SEPARATOR."config.php";
	echo($initphp." exists > ".file_exists($initphp));
	echo('<hr />'.print_r($URL_PARAMS,true));
	echo('</pre>');
}
else {
	require(ROOT.'etc/config.php');
	//require(ROOT.'etc/init.php');
	require(ROOT.'etc/session.php');
	require(ROOT.'etc/service.php');
}
?>