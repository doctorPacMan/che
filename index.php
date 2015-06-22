<?php
error_reporting(E_ALL);
ini_set ('display_errors', '1');

ini_set ('mysql.default_host', '127.0.0.1');
ini_set ('mysql.default_user', 'root');
ini_set ('mysql.default_password', '');

//=================================================================
// parse url
//=================================================================
if (isset($_SERVER["REQUEST_URI"])) {
	$URL_PARAMS = explode("?", $_SERVER["REQUEST_URI"]);
	$URL_PARAMS = preg_split("/\//", $URL_PARAMS[0], -1, PREG_SPLIT_NO_EMPTY);
} else $URL_PARAMS = array();

define('ROOT', dirname(__FILE__).DIRECTORY_SEPARATOR);
define('HTTP', '//'.$_SERVER['SERVER_NAME']);

if(0) {
	echo('<pre>');
	echo(ROOT.'<br />'.HTTP.'<hr />');
	$initphp = ROOT."etc/init.php";
	echo($initphp." exists > ".file_exists($initphp));
	echo('<hr />'.print_r($URL_PARAMS,true));
	echo('</pre>');
}
else require(ROOT.'etc/init.php');
//require(ROOT.'etc/service.php');
?>