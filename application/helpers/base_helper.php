<?php
	function base_assets($url = ''){
		return base_url().'assets/'.$url;
	}
	function base_api($url = ''){
		$ci = &get_instance();
		return $ci->config->item('api_url').$url;
	}
	function api_key(){
		$ci = &get_instance();
		return $ci->config->item('api_key');
	}
	function app_name(){
		$ci = &get_instance();
		return $ci->config->item('app_name');
	}
	function app_name_summary(){
		$ci = &get_instance();
		return $ci->config->item('app_name_summary');
	}
?>