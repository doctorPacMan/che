<?
require(ROOT.'php/class.db.php');
require(ROOT.'php/class.user.php');

$DB = new DB('u440306');

$User = new cUser();
if(!empty($_SESSION['user'])) {
	$User->register($_SESSION['user']);
	$Smarty->assign('User', $User->data);
}

$Smarty->assign('ROOT', HTTP);
$Smarty->assign('SSID', 'SSID');

if(empty($URL_PARAMS[0])) $Smarty->display('root.tpl');
else if($URL_PARAMS[0]=='account') require(ROOT.'php/account/index.php');
else if($URL_PARAMS[0]=='admin') require(ROOT.'php/admin/index.php');
else if($URL_PARAMS[0]=='auth') require(ROOT.'php/auth/index.php');
else if($URL_PARAMS[0]=='duel') require(ROOT.'php/duel/index.php');
else if($URL_PARAMS[0]=='test') require(ROOT.'php/test.php');
else $Smarty->display('void.tpl');
?>