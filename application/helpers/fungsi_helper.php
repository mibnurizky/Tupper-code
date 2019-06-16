<?php
	//method like "POST", "GET".
	//url api
	//data is array
	function curl2run($method,$url,$data){
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => $method,
			CURLOPT_POSTFIELDS => json_encode($data),
			// CURLOPT_COOKIE => "PHPSESSID=tgdlq1gonnt3sl1bf5b38ghsu4",
			CURLOPT_HTTPHEADER => array(
				"content-type: application/json"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if($err){
			$data['error_code'] = "1";
			$data['error_message'] = $err;
			return $data;
		}
		else{
			$json = json_decode($response);
			return $json;
		}
	}

	function generateHash($text){
		return password_hash($text, PASSWORD_BCRYPT);
	}

	function verifyHash($text,$hash){
		return password_verify($text, $hash);
	}

	function setSession($arr_sess){
		$ci = &get_instance();
		$ci->session->set_userdata($arr_sess);
	}

	function getSession($name){
		$ci = &get_instance();
		return $ci->session->userdata($name);
	}

	function setNotification($name,$text){
		$ci = &get_instance();
		$ci->session->set_flashdata($name,$text);
	}

	function getNotification($name){
		$ci = &get_instance();
		return $ci->session->flashdata($name);
	}

	function inPOST($name){
		$ci = &get_instance();
		return $ci->input->post($name);
	}

	function inGET($name){
		$ci = $ci = &get_instance();
		return $ci->input->get($name);
	}
?>