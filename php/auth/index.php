<?
/*
$srv = empty($URL_PARAMS[1]) ? 'main' : $URL_PARAMS[1];
if($srv == 'register') require(ROOT.'php/auth/register.php'); 
else if($srv=='login') require(ROOT.'php/auth/login.php');
else $Smarty->display('auth/main.tpl');
*/
$action = empty($_POST['action']) ? null : $_POST['action'];
$result = null;
$ssid = null;

if($action=='login') {
	$ff_login = $_POST['login'];
	$ff_psswd = $_POST['password'];

	$req = "`login`='".$ff_login."' AND `password`='".md5($ff_psswd)."'";
	$res = $DB->getData('users',$req);

	if(!$res) $result = false;
	else {
		$result = $res[0];
		$User->register($result);
		$Smarty->assign('message',print_r($result,true));
	}
}
$Smarty->assign('result',$result);
$Smarty->display('auth/main.tpl');
?>