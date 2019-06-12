<?php
	//for query basic
	function dbQuery($sql){
		$ci = &get_instance();
		$query = $ci->db->query($sql);
		return $query;
	}

	function dbInsert($table,$data){
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

	function dbUpdate($table,$data,$identity){
		$total = count($data);
		$no = 0;
		$data_value = "";
		foreach ($data as $key => $value) {
			$no++;
			if($no<$total){
				$data_value .= $key."="."'".$data[$key]."'".",";
			}
			else{
				$data_value .= $key."="."'".$data[$key]."'";	
			}
		}

		$sql = "UPDATE ".$table." SET ".$data_value." WHERE ".$identity;

		return $sql;
	}
?>