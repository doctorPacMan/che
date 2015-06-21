<?
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

$Smarty->assign('ROOT',HTTP);
?> 