<?
Class cUser {
	function cUser() {
		

	}
	function register($data) {
	
		$ddd = print_r($data,true);

		if($data['ssid']) {
			session_id($data['ssid']);
			session_start();
		}
		else {
			session_start();
			$mmm = array("ssid"=>"'".session_id()."'");
			$DB = new DB();
			$DB->editData('users',"`id`='".$data['id']."'",$mmm);
		}
		
		//echo("<pre>".$ddd."</pre>");
		
		return;
	}
}
?>