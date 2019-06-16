<?php
	function loadModel($class_model,$name=''){
		$ci = &get_instance();
		if($name==''){
			return $ci->load->model($class_model);
		}
		else{
			return $ci->load->model($class_model,$name);
		}
	}
?>