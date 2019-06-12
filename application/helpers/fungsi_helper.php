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
?>