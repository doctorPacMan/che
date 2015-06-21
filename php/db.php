<?
require(ROOT.'etc/class.db.php');
$Db = new DB('test','dbuser','123qwe');
$dta = $Db->getDataAll('user');
//$Db->killConnect();
print_r($dta);
?>
db.php