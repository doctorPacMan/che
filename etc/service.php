<?
$Smarty->assign('ROOT', HTTP);
$Smarty->assign('SSID', SSID);

// echo "<pre>".print_r($URL_PARAMS,true)."</pre>";
if(empty($URL_PARAMS[0])) $Smarty->display('root.tpl');
else if($URL_PARAMS[0]=='db') require(ROOT.'php/db.php');
else if($URL_PARAMS[0]=='admin') require(ROOT.'php/admin/index.php');
else if($URL_PARAMS[0]=='auth') require(ROOT.'php/auth/index.php');
else $Smarty->display('root.tpl');
?>