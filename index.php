<?php
error_reporting(E_ALL);
ini_set ('display_errors', '1');

define('ROOT', dirname(__FILE__).DIRECTORY_SEPARATOR);
define('HTTP', '//'.$_SERVER['SERVER_NAME']);

ini_set('mysql.default_host', 'localhost');
ini_set('mysql.default_user', 'root');
ini_set('mysql.default_password', '');
ini_set('session.save_path', ROOT."tmp/session");
ini_set('session.use_cookies', '1');

// ini_set('mysql.default_host', 'u440306.mysql.masterhost.ru');
// ini_set('mysql.default_user', 'u440306');
// ini_set('mysql.default_password', 'vI_7.O3ieS');

//=================================================================
// parse url
//=================================================================
if (isset($_SERVER["REQUEST_URI"])) {
	$URL_PARAMS = explode("?", $_SERVER["REQUEST_URI"]);
	$URL_PARAMS = preg_split("/\//", $URL_PARAMS[0], -1, PREG_SPLIT_NO_EMPTY);
} else $URL_PARAMS = array();

if(0) {
	echo('<pre>');
	echo(ROOT.'<br />'.HTTP.'<hr />');
	$initphp = ROOT."etc/init.php";
	echo($initphp." exists > ".file_exists($initphp));
	echo('<hr />'.print_r($URL_PARAMS,true));
	echo('</pre>');
}
else {
	require(ROOT.'etc/init.php');
	require(ROOT.'etc/session.php');
	require(ROOT.'etc/service.php');
}
?>