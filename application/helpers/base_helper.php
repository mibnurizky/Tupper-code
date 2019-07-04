<?php
	function base_assets($url = ''){
		return base_url().'application/assets/'.$url;
	}
	function base_api(){
		$ci = &get_instance();
		return $ci->config->item('api_url');
	}
	function api_key(){
		$ci = &get_instance();
		return $ci->config->item('api_key');
	}
?>