<?php
	//for query basic
	function dbQuery($sql){
		$ci = &get_instance();
		$query = $ci->db->query($sql);
		return $query;
	}

	function dbInsert($table,$data){
		$ci = &get_instance();
		
	}
?>