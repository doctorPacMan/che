<?
Class DB {
	var $link;

	function DB($name, $user=null, $pass=null){
    	$this->host = null;
    	$this->name = $name;
    	$this->user = $user;
    	$this->pass = $pass;
    	$this->link = mysql_connect($this->host,$this->user,$this->pass) or die("Could not connect : " . mysql_error());
		mysql_select_db($this->name) or die("Could not select database");
    	
    	//echo('new DB '.$this->link.' '.$this->name);

	}
	// ============================================================================= Get
	function getDataAll($table) {
		return $this->getData($table, null);
	}
	function getData($table, $where=null){
	    $query = "SELECT * FROM `".$this->name."`.`".$table."`";
	    if ($where) $query .= " WHERE ".$where."";

		$req = mysql_query($query) or die($query."\nQuery failed : " . mysql_error());
		$res = array();
	    while ($line = mysql_fetch_array($req, MYSQL_ASSOC)) array_push($res, $line);
    	
    	@mysql_free_result($req);
		
		return $res;
	}
	// ============================================================================= Add
	function addData($table,$data){
				
		$flds = array(); $vals = array();
		foreach ($data as $f => $v) {array_push($flds, '`'.$f.'`');array_push($vals, $v);}
		$flds = implode(', ',$flds); $vals = implode(', ',$vals); 

		$query = "INSERT INTO `".$this->name."`.`".$table."`";
	    $query.= " (".$flds.") VALUES (".$vals.")";
    	$result = mysql_query($query) or die("Query failed : " . mysql_error());
	    @mysql_free_result($result);
	}
	// ============================================================================= Edit
	function editData($table, $where, $data){
		$vals = array();
		foreach ($data as $f => $v) array_push($vals, '`'.$f.'`='.$v);
		$vals = implode(', ',$vals); 

		$query = "UPDATE `".$this->name."`.`".$table."`";
		$query.= " SET ".$vals." WHERE ".$where." LIMIT 1";
	    $result = mysql_query($query) or die($query."\nQuery failed : " . mysql_error());

	    @mysql_free_result($result);
	}
	// ============================================================================= Edit
	function editData2($table,$usl,$data){
	    $Fstring="`".key($data)."` = ".$data[key($data)]; 

	    foreach ($data as $field => $dcont) if($field!=key($data)) $Fstring.=",`".$field."` = ".$dcont;

		$query="UPDATE `".$table."` SET ".$Fstring." WHERE ".$usl." LIMIT 1";
	    $result = mysql_query($query) or die($query."\nQuery failed : " . mysql_error());

	    @mysql_free_result($result);
	}
	// ============================================================================= Delete
	function deleteData($table,$usl){
		$query="DELETE FROM `".$table."` WHERE ".$usl;
    	$result = mysql_query($query) or die("Query failed : " . mysql_error());

	    @mysql_free_result($result);
	}
	// ============================================================================= Get
	function checkExist($table, $field, $wha){
	    $query = "SELECT `".$field."` FROM ".$table." WHERE `".$field."`='".$wha."'";
    
	    $result = mysql_query($query) or die("Query failed : " . mysql_error());
 
	    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    	    foreach ($line as $k => $col_value) $assa[$k]=$col_value;
		}
    	mysql_free_result($result);

		if (!empty($assa)) 
			return true;
		else 
			return false;
	}

	function killConnect(){
    	mysql_close($this->dblink);
	}

	function makeQuery($query, $par=false){
	    $result = mysql_query($query) or die("Query failed : " . mysql_error());
	    
	    if ($par) 
	    {
		    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
		    {
    		    foreach ($line as $k => $col_value) $assa[$k]=$col_value;
    		    if(!empty($assa)) $assa2[] = $assa;
			}
	    	mysql_free_result($result);

	    	if(!empty($assa2)) return $assa2;
		}
	    else 
	    	return true;
	}

};
?>