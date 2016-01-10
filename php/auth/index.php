<?
$action = empty($_POST['action']) ? false : $_POST['action'];
$result = false;
$message = 'hello';

if($action=='login') {
	
	$ff_name = $_POST['login'];
	$ff_pass = $_POST['password'];

	$req = "`name`='".$ff_name."' AND `pass`='".md5($ff_pass)."'";
	$res = $DB->getData('users',$req);

	if(!$res) $result = false;
	else {
		$result = $res[0];

		$rn = array("ssid"=>"'".session_id()."'");
		$DB->editData('users', $req, $rn);
		$result['ssid'] = session_id();
		$_SESSION['user'] = $result;
		//$User->register($result);
		//$DB->editData('users', "`id`='".$data['id']."'", $rn);
	}
}
else if($action=='logout') {

	unset($_SESSION['user']);
	//$User->destroy();
	$Smarty->assign('User',array());
	$message = 'logout success';
	$result = true;
}

$Smarty->assign('message',$message);
$Smarty->assign('result', $result);
$Smarty->display('auth/main.tpl');
?>