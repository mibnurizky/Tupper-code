<?php
	function base_assets(){
		return base_url().'application/assets';
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