<?
/*
$srv = empty($URL_PARAMS[1]) ? 'main' : $URL_PARAMS[1];
if($srv == 'register') require(ROOT.'php/auth/register.php'); 
else if($srv=='login') require(ROOT.'php/auth/login.php');
else $Smarty->display('auth/main.tpl');
*/
$action = empty($_POST['action']) ? false : $_POST['action'];
$result = null;

if(empty($action)) {}
/*	==================================================================
	Login
*/
else if ($action=='login') {
	$ff_login = $_POST['login'];
	$ff_psswd = $_POST['password'];

	$DB = new DB('cherio');
	$req = "`login`='".$ff_login."' AND `password`='".md5($ff_psswd)."'";
	$res = $DB->getData('users',$req);

	if(!$res) $Smarty->assign('message','Login fail '.$req);
	else {
		$user = $res[0];
		$Smarty->assign('message',print_r($user,true));
		//session_id($user['ssid']);
	}
}
/*	==================================================================
	Register
*/
else if ($action=='rgstr') {
	$ff_login = $_POST['login'];
	$ff_psswd = $_POST['password'];

	if(empty($result) && empty($_POST['login'])) $result = 'Empty login';
	if(empty($result) && empty($_POST['password'])) $result = 'Empty password';
	if(empty($result)) {
		$DB = new DB('cherio');
		$res = $DB->getData('users',"`login`='".$ff_login."'");
		if(!empty($res)) $result = print_r($res,true);
	}
	if(empty($result)) {
		$DB = new DB('cherio');
		$DB->addData('users', array (
			"login"			=> "'".$ff_login."'",
			"password" 		=> "'".md5($ff_psswd)."'",
			"modified_at"	=> "NOW()",
			"ssid"			=> "'".session_id()."'"
		));
		$result = 'Register success! '.$ff_login.'@'.$ff_psswd;
	}
	$Smarty->assign('message',$result);
}
else {}

$Smarty->display('auth/main.tpl');
/*
$req_cor = "INSERT INTO `cherio`.`users` (`login`, `password`, `modified_at`) VALUES ('ss11ss', '123456', NOW())";
$req_new = "INSERT INTO `cherio`.`users`";
$req_obj = array (
	"login" => "'ss11ss'",
	"password"=> "'Password'",
	"modified_at" => "NOW()"
);
$flds = array();$vals = array();
foreach ($req_obj as $f => $v) {array_push($flds, '`'.$f.'`');array_push($vals, $v);}
$req_new = $req_new." (".implode(', ',$flds).") VALUES (".implode(', ',$vals).")";

echo('<pre>'.$req_cor.'</pre>');
echo('<pre>'.$req_new.'</pre>');
*/
?>