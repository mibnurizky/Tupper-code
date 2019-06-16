<?php
	class Users_model extends Core_Model{
		public function readUsers(){
			return dbQuery("SELECT * FROM users");
		}
	}
?>