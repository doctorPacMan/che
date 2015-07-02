<?
$Smarty->assign('ROOT', HTTP);
$Smarty->assign('SSID', 'SSID');

if(empty($URL_PARAMS[0])) $Smarty->display('root.tpl');
else if($URL_PARAMS[0]=='account') require(ROOT.'php/account/index.php');
else if($URL_PARAMS[0]=='admin') require(ROOT.'php/admin/index.php');
else if($URL_PARAMS[0]=='auth') require(ROOT.'php/auth/index.php');
else $Smarty->display('void.tpl');
?>