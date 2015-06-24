<?
//$DB = new DB('cherio','root','');
$DB = new DB('cherio');
if(0) $DB->addData('users', array (
	'login' => 'loginn',
    'password' => 'pass'
    ));
$data = $DB->getData('users');
echo "<pre>".print_r($data,true)."</pre><hr>";

//$Smarty->assign('data','admin/main.tpl');
//$Smarty->display('admin/main.tpl');
?>