<?php
	//for query basic
	function dbQuery($sql){
		$ci = &get_instance();
		$query = $ci->db->query($sql);
		return $query;
	}

	//for insert row in table, $data is array
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

	//for update row in table, $data is array and $identity like users_id = '1'
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

		return dbQuery($sql);
	}

	//for delete row in table, $identity like users_id = '1'
	function dbDelete($table,$identity){
		$sql = "DELETE FROM ".$table." WHERE ".$identity;
		return dbQuery($sql);
	}
?>