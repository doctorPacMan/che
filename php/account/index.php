<?
$action = !empty($_REQUEST['action']) ? $_REQUEST['action'] : null;
$errors = array();
$result = null;
function sessionDestroy() {
	$params = session_get_cookie_params();
    setcookie(session_name(),'',strtotime('01-01-2000 00:00:00'),
        $params["path"],$params["domain"],
        $params["secure"],$params["httponly"]
    );
	unset($_SESSION['user']);
	session_destroy();
}
function getUserData($name,$pass) {
	
	global $DB;
	
	$name = mysql_real_escape_string($name);
	$pass = mysql_real_escape_string($pass);
	
	$req = "`login`='".$name."' AND `password`='".md5($pass)."'";
	$res = $DB->getData('users',$req);
	
	return $res ? $res[0] : null;
}

function renewUserData($user) {

	global $DB;

	$sid = session_id();
	$hsh = md5($user['id']);
	$now = date("Y-m-d H:i:s", time());
	$res = $DB->editData('users','id='.$user['id'],array(
		'hash'=>'\''.$hsh.'\'',
		'ssid'=>'\''.$sid.'\'',
		'login_at'=>'NOW()'
	));
	//$user['ssid'] = $sid;
	//$user['hash'] = $hsh;
	//$user['login_at'] = $now;
	$user['data'] = print_r($user,true);
	return $user;
}

if($action=='logout') sessionDestroy();
if($action=='regster') {
	
	$name = mysql_real_escape_string($_REQUEST['login']);
	$pass = mysql_real_escape_string($_REQUEST['password']);
	
	if(empty($name)) array_push($errors, 'Empty username');
	if(empty($pass)) array_push($errors, 'Empty password');
	if(!preg_match("/^[a-zA-Z0-9]+$/", $name)) array_push($errors, 'Incorrect login');
    if(strlen($name)<3 || strlen($name)>20) array_push($errors, 'Incorrect login length');

	$res = $DB->getData('users',"`login`='".$name."'");
	if(!empty($res)) array_push($errors, 'Login '.$name.' has already been taken');
	else {
		$DB->addData('users', array (
			"login"			=> "'".$name."'",
			"password" 		=> "'".md5($pass)."'",
			"pass"	 		=> "'".$pass."'"
		));
		$result = 'Register success! '.$name.'@'.$pass;
		// $action = 'login';
	}
}
if($action=='login') {
	
	$name = mysql_real_escape_string($_REQUEST['login']);
	$pass = mysql_real_escape_string($_REQUEST['password']);
	
	if(empty($name)) array_push($errors, 'Empty username');
	if(empty($pass)) array_push($errors, 'Empty password');

	if(empty($errors)) $result = getUserData($name, $pass);
	if($result) $_SESSION['user'] = renewUserData($result);
}

if(!empty($_SESSION['user'])) $Smarty->assign('User',$_SESSION['user']);
else $Smarty->assign('User',null);

$Smarty->assign('action',$action);
$Smarty->assign('errors',$errors);
$Smarty->assign('result',print_r($result,true));
$Smarty->assign('session',empty($_SESSION) ? 'null' : print_r($_SESSION,true));

$Smarty->display('account/main.tpl');
?>