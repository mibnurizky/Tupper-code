<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Core_Controller {
	public function index(){
		loadView('welcome_message');
	}
	public function form(){
		if(isset($_POST['btn_input'])){
			$nama = inPOST('nama');
			echo $nama;
		}
		else{
			loadView('form_v');
		}
	}
}
