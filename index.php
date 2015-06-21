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
echo('<pre>'.ROOT.'<br />'.HTTP.'</pre>');
echo('<pre>'.print_r($URL_PARAMS,true).'</pre>');
//echo(file_exists(ROOT.'etc/init.php') ? 1:0);
//require(ROOT.'etc/init.php');
//require(ROOT.'etc/service.php');
?>