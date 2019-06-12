<?php
	//for query basic
	function dbQuery($sql){
		$ci = &get_instance();
		$query = $ci->db->query($sql);
		return $query;
	}

	function dbInsert($table,$data){
		$ci = &get_instance();
		$total = count($data);
		$no = 0;
		$field = "";
		$data_value = "";
		foreach ($data as $key => $value) {
			$no++;
			if($no<$total){
				$field .= $key.",";
				$data_value .= "'".$data[$key]."'".",";
			}
			else{
				$field .= $key;
				$data_value .= "'".$data[$key]."'";
			}
		}

		$sql = "INSERT INTO ".$table."(".$field.") VALUES(".$data_value.")";

		return dbQuery($sql);
	}
?>