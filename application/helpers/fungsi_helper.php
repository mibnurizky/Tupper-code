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

	function setNotificationLink($type,$msg,$name='msg'){
		$ci = &get_instance();

		if($type == 'E'){
			$ci->session->set_flashdata($name,'Swal.fire("Error!", "'.$msg.'", "error");');
		}
		elseif($type == 'S'){
			$ci->session->set_flashdata($name,'Swal.fire("Success!", "'.$msg.'", "success");');
		}
		elseif($type == 'W'){
			$ci->session->set_flashdata($name,'Swal.fire("Warning!", "'.$msg.'", "warning");');
		}
		elseif($type == "I"){
			$ci->session->set_flashdata($name,'Swal.fire("Info!", "'.$msg.'", "info");');
		}
	}

	function setNotification($type,$msg,$name='msg'){
		$ci = &get_instance();

		if($type == 'E'){
			$ci->session->set_flashdata($name,"Swal.fire({title: 'Error!', type: 'error', html: '".$msg."', showCloseButton: true});");
		}
		elseif($type == 'S'){
			$ci->session->set_flashdata($name,"Swal.fire({title: 'Success!', type: 'success', html: '".$msg."', showCloseButton: true});");
		}
		elseif($type == 'W'){
			$ci->session->set_flashdata($name,"Swal.fire({title: 'Warning!', type: 'warning', html: '".$msg."', showCloseButton: true});");
		}
		elseif($type == "I"){
			$ci->session->set_flashdata($name,"Swal.fire({title: 'Info!', type: 'info', html: '".$msg."', showCloseButton: true});");
		}
	}

	function getNotification($name='msg'){
		$ci = &get_instance();
		return $ci->session->flashdata($name);
	}

	function inPOST($name){
		$ci = &get_instance();
		return $ci->input->post($name);
	}

	function inGET($name){
		$ci = &get_instance();
		return $ci->input->get($name);
	}

	function dataView($index,$value){
		$ci = &get_instance();
		$ci->data[$index] = $value;
	}

	function setEncrypt($string){
		$encrypt_method = "AES-256-CBC";
	    $secret_key = 'mibnurizky.com';
	    $secret_iv = 'siramadibuatolehmohamadibnurizky';
	    // hash
	    $key = hash('sha256', $secret_key);

	    $iv = substr(hash('sha256', $secret_iv), 0, 16);

	    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);

        return $output;
	}
	function getDecrypt($string){
		$encrypt_method = "AES-256-CBC";
	    $secret_key = 'mibnurizky.com';
	    $secret_iv = 'siramadibuatolehmohamadibnurizky';
	    // hash
	    $key = hash('sha256', $secret_key);

	    $iv = substr(hash('sha256', $secret_iv), 0, 16);
		$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);

		return $output;
	}
	function random_number($length = 10) {
	    $characters = '0123456789';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
	function random_characters($length = 10) {
	    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
	function currentDateTime($date=""){
		if($date == ""){
			return date_format(date_create(),"Y-m-d H:i:s");
		}
		else{
			return date_format(date_create($date),"Y-m-d H:i:s");
		}
	}
	function currentDate(){
		return date_format(date_create(),"Y-m-d");
	}
	function getImage($img,$option=''){
		return '<img '.$option.' src="data:image/jpeg;base64,'.base64_encode( $img ).'"/>';
	}
	function generateID(){
		$key = random_number(10);
		return date_format(date_create(),"YmdHisu".$key);
	}
	function sendEmail($to,$subject,$message){
		$data['subject'] = $subject;
		$data['to'] = $to;
		$data['html'] = $message;
		curl2run("POST","/email/send",$data);
	}
	function daterange($text){
		$daterange = explode(" ", $text);
		$date1 = explode("/", $daterange[0]);
		$date2 = explode("/", $daterange[2]);

		$from = $date1[2]."-".$date1[1]."-".$date1[0];
		$to = $date2[2]."-".$date2[1]."-".$date2[0];

		$date[0] = $from;
		$date[1] = $to;

		return $date;
	}
	function export_pdf($filename,$html){
		$style = '
			<style>
				table, th, td {
				  border-collapse: collapse;
				}
			</style>
		';
		$html = $style.$html;
		$mpdf = new \Mpdf\Mpdf();
		$mpdf->SetTitle($filename);
		$mpdf->SetFooter($filename.' - '.app_name());
		$mpdf->WriteHTML($html);
		$mpdf->Output($filename.'.pdf', 'I');
	}
?>