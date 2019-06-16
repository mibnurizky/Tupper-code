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

	function loadView($view,$return=FALSE){
		$ci = &get_instance();
		if(empty($ci->data)){
			return $ci->load->view($view,$return);
		}
		else{
			return $ci->load->view($view,$ci->data,$return);
		}
	}

	function loadHelper($helper){
		$ci = &get_instance();
		$ci->load->helper($helper);
	}

	function loadHelpers($helper){
		$ci = &get_instance();
		$ci->load->helpers($helper);
	}

	function loadlibrary($library){
		$ci = &get_instance();
		$ci->load->library($library);
	}

	function inPost($name){
		$ci = &get_instance();
		return $ci->input->post($name);
	}

	function inGet($name){
		$ci = $ci = &get_instance();
		return $ci->input->get($name);
	}
?>