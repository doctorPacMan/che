<?
$srv = empty($URL_PARAMS[1]) ? 'main' : $URL_PARAMS[1];
if($srv == 'register') require(ROOT.'php/auth/register.php'); 
else if($srv=='enter') require(ROOT.'php/auth/enter.php');
else $Smarty->display('auth/main.tpl');
?>