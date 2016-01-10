<?
ini_set('session.save_path', ROOT.'tmp/session');
ini_set('session.use_cookies', '1');
ini_set('session.use_only_cookies', '1');
ini_set('session.auto_start', '0');

if($_SERVER['HTTP_HOST']=='cherio.su') {
	ini_set('mysql.default_host', 'u440306.mysql.masterhost.ru');
	ini_set('mysql.default_user', 'u440306');
	ini_set('mysql.default_password', 'vI_7.O3ieS');
} else {
	ini_set('mysql.default_host', 'localhost');
	ini_set('mysql.default_user', 'root');
	ini_set('mysql.default_password', '');
}

if(!empty($URL_PARAMS) && $URL_PARAMS[0]=='rake') require(ROOT.'php/rake.php');

//=================================================================
// Turn on SMARTY
//=================================================================
require(ROOT.'lib/smarty/libs/Smarty.class.php');
$Smarty = new Smarty;
$Smarty->compile_dir = ROOT.'lib/smarty/compile/';
$Smarty->cache_dir = ROOT.'lib/smarty/cache/';
$Smarty->template_dir = ROOT.'tpl/';
$Smarty->config_dir = ROOT.'tpl/cfg/';

// mkdir($Smarty->compile_dir, 0777);
// mkdir($Smarty->cache_dir, 0777);
// chmod($Smarty->compile_dir, 0777);
// chmod($Smarty->cache_dir, 0777);
?>