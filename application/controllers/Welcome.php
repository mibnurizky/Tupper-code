<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Core_Controller {
	public function index(){
		loadView('welcome_message');
	}
	public function form(){
		loadView("form_v");
	}
}
